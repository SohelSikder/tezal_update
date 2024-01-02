<?php

namespace App\Imports;

use App\Models\Admin\Product;
use App\Models\Admin\ProductTag;
use App\Models\Admin\Color;
use App\Models\Admin\Size;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Illuminate\Http\Request;
class ProductImport implements ToModel, SkipsEmptyRows, WithHeadingRow, WithChunkReading, WithValidation
{
    protected $request;
    public function __construct(Request $request){
        $this->request = $request;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);
        $uniqueKeys = [
            'en_About' => $row['code'],
        ];
        $data = [
            'en_Product_Name' => $row['model'].'-'.$row['code'] ?? 'Enter Product Name',
            'en_Product_Slug' => $this->makeSlug($row),
            'Category_Id' => $this->request->en_category_name ?? 0,
            'Price' => $row['price'] ?? 0,
            'Discount' => 0,
            'Discount_Price' => $row['price'] ?? 0,
            'en_About' => $row['code'] ?? 0,
            'en_Description' => 'Code: '.$row['code'].'<br> Model: '.$row['model'].'<br> Color: '.$row['color'].'<br> Size: '.$row['size'].'<br> Blades: '.$row['blades'],
            'Quantity' => 0,
            'Primary_Image' => $row['code'] ? $row['code'].'.jpg':'noimage.jpg',
            'Status' => 1,
            'On_Sale' => 1,
            'Voucher' => $this->generateRandomString(6),
        ];
        $product = Product::updateOrCreate($uniqueKeys, $data);
        if (!empty($product)){
            if (isset($row['product_tag'])) {
                foreach ($row['product_tag'] as $rpt) {
                    ProductTag::create([
                        'tag' => $rpt,
                        'product_id' => $product->id,
                    ]);
                }
            }
            if(isset($row['color'])){
                $color = Color::firstOrCreate(['Name' => $row['color']]);
                if($color){
                    $product->colors()->sync($color->id);
                }
            }
            if(isset($row['size'])){
                $size = Size::firstOrCreate(['Size' => $row['size']]);
                if ($size) {
                    $product->sizes()->sync($size->id);
                }
            }
        }

    }

    public function makeSlug($row){

        $slug = $row['model'] ? $row['model'].'-'.$row['code']:$this->generateRandomString(6);
        if(!empty($slug)){
            $slug = preg_replace('/\s+/u','-',trim($slug));
            return $slug;
        }else{
            return $row['code'] ? $row['code']:$this->generateRandomString(6);
        }
    }

    public function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function rules(): array
    {
        return [
            'model' => ['required'],
            'price' => ['required'],
        ];
    }

    public function chunkSize(): int
    {
        return 5000;
    }

}
