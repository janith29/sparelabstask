<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();
        Product::create(array(
        'name'     => 'Coffee',
        'price'    => '150.50',
        'discription'=> 'Coffee is a brewed drink prepared from roasted coffee beans, the seeds of berries from certain Coffea species. Once ripe, coffee berries are picked, processed, and dried. Dried coffee seeds are roasted to varying degrees, depending on the desired flavor.',
        'image'=> '1productpic.jpg'

        ));
        Product::create(array(
            'name'     => 'Tea',
            'price'    => '50.75',
            'discription'=> 'Tea is an aromatic beverage commonly prepared by pouring hot or boiling water over cured leaves of the Camellia sinensis, an evergreen shrub native to East Asia. After water, it is the most widely consumed drink in the world.',
            'image'=> '2productpic.jpg'
            ));
    }
}
