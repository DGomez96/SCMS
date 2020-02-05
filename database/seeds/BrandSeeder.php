<?php

use Illuminate\Database\Seeder;
use App\Marcas;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marcas_arr = [
            '3MK','ACER','AKASHI','ALCATEL','ALTEC LANSING','AMAZON','APPLE','DCU','ASUS','BEURER','BLACK+DECKER','BLACKVIEW','BOOMPODS','BOSE','BRAUN',
            'BRIGMTON','JC','CANON','CASE LOGIC','CASIO','CAT','CREATIVE','DELONGHI','DENVER','DICOTA','DISNEY','DORO','ELARI','EMOS','ENGEL AXIL',
            'E-VITTA','FENDER','FIDGET','FITBIT','FONESTAR','FOODSAVER','FOTIMA','FUJIFILM','GARANTÍA 3','GARMIN','GOOGLE','GOPRO','GP','GRUNDIG',
            'HAEGER','MYPHONE','HARMAN KARDON','HER','HISENSE','HITACHI','HOMEDICS','HONOR','HP','HUAWEI','HYUNDAI','INNJOO','IROBOT','JBL','KEEP OUT',
            'SONY','KLIPSCH','KRUPS','LAUSON','LENOVO','LG','LOGITECH','MARSHALL','MAXCOM','MAXELL','MAXTON','MEDION','MEIZU','METRONIC','METZ','MOTOROLA',
            'MOULINEX','MUSE','MUVIT','NATIONAL GEOGRAPHIC','NIKON','NINEBOT','NOKIA','NUTRIBULLET','ONE FOR ALL','ONE PLUS','ONKYO','OPPO','ORBEGOZO',
            'OREGON SCIENTIFIC','PANDA','PANZERGLASS','PARKINGDOOR','PHILIPS','PIONEER','PLANTRONICS','POCKETBOOK','PROTECTPAX','RAZOR','RETICARE','ROLLEI',
            'ROWENTA','RUSSELL HOBBS','SAMSUNG','SANDISK','SANGEAN','SEAWAG','SENNHEISER','SKULLCANDY','SPC','SUBBLIM','SUNMATIC','SUPERCHEF','TADO','TEAC',
            'TERRAQUE','THOMSON','TOSHIBA','TP-LINK','TRUST','UAG','VELBON','VIARK','VOGELS','WESDAR','WESTERN DIGITAL','WHINCK','WIKO','XIAOMI','ZULI'
        ];
        
        foreach ($marcas_arr as &$marca) {

            Marcas::create([
                'brand_name' => $marca
            ]);
         }

    }
}
