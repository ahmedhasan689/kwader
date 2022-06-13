<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->truncate();

        $fields = ['برمجة وتطوير', 'هندسة وعلوم', 'تسويق ومبيعات', 'كتابة وترجمة', 'دعم فني', 'محاسبة ومالية', 'فن وتصميم', 'تكنولوجيا المعلومات'];

        foreach ($fields as $field) {
            DB::table('fields')->insert([
                'field_name' => $field,
            ]);
        }
    }
}
