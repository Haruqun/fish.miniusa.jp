<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\FishingSpot;

class FishingSpotSeeder extends Seeder
{
    public function run()
    {
        $filePath = storage_path('app/excel/fish_point.xlsx');

        // ファイルの読み込み
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        // ヘッダー行をスキップ
        array_shift($rows);

        // データの保存
        foreach ($rows as $row) {
            // タイトル	タイトルURL	画像URL	タグ	fishinglist03_txt	fishinglistgrid_col	fishinglistgrid_col1	fishinglistgrid_col2	fishinglistgrid_col3	fishinglistgrid_col4	fishinglistgrid_col5	fishinglistgrid_col6	fishinglistgrid_col7	エリア	種類	釣り方	釣魚	おすすめの季節	設備	関連リンク	テキスト
            FishingSpot::create([
                'title' => $row[0],
                'url' => $row[1],
                'image_url' => $row[2],
                'area' => $row[12],
                'type' => $row[13],
                'fishing_methods' => $row[14],
                'fish_species' => $row[15],
                'best_season' => $row[16],
                'facilities' => $row[17],
                'related_links' => $row[18],
                'description' => $row[19],
            ]);
        }
    }
}
