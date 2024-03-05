<?php

namespace Database\Seeders;

use App\Models\BranchInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.bank_id
     */
    public function run(): void
    {
        $data = [
            ['branch_code' => '4005', 'bank_id' => '4', 'branch_name' => 'Principal Branch', 'address' => '30-31, Dilkusha C/A, BCIC Bhaban, Dhaka Tel: +88-02-9560312 Email: pbbrmg@abbl.com', 'swift_code' => '020275352', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['branch_code' => '4002', 'bank_id' => '4', 'branch_name' => 'Karwan Bazar Branch', 'address' => 'BSEC Bhaban 102 Kazi Nazrul Islam Avenue, Dhaka 1215 Tel: +88-02-8117598 Email: kwrnmg@abbl.com', 'swift_code' => '020262536', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['branch_code' => '108', 'bank_id' => '2', 'branch_name' => 'Shantinagar Branch', 'address' => '41, Chamelibagh,(Green Peace), Shantinagar, Dhaka-1217 Tel: +8801711541792 Email: zia.chowdhury8522@dutchbanglabank.com', 'swift_code' => '090276349', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['branch_code' => '', 'bank_id' => '5', 'branch_name' => 'Local Principal Branch', 'address' => '', 'swift_code' => '', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['branch_code' => '2791', 'bank_id' => '1', 'branch_name' => 'Wapda Branch', 'address' => '11, Ellal Chamber, Motijheel C/A, Dhaka Mob: +8801713253279, Tel: +88-02-9554157 Email: br2791@bangla.net', 'swift_code' => '010276945', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['branch_code' => '3685', 'bank_id' => '1', 'branch_name' => 'Farmgate Branch', 'address' => 'BARC Building, Farmgate, Dhaka Mob: +8801713253368, Tel: +88-02-41025832 Email: br3685@bangla.net', 'swift_code' => '010261455', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['branch_code' => '', 'bank_id' => '3', 'branch_name' => 'Bonosree Branch', 'address' => '', 'swift_code' => '', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['branch_code' => '', 'bank_id' => '3', 'branch_name' => 'Rupnagar Branch', 'address' => '', 'swift_code' => '', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
            ['branch_code' => '', 'bank_id' => '3', 'branch_name' => 'Malibagh Branch', 'address' => '', 'swift_code' => '', 'status' => 1, 'created_by' => 1, 'updated_by' => null],
        ];
        BranchInfo::insert($data);
    }
}
