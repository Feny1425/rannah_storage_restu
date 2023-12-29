<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::createMany([
            [
              'name'=> 'اسفنج',
              'name_en'=> 'Sponge',
              'unit'=> 'حبة',
              'unit_en'=> 'Piece',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'باذنجان',
              'name_en'=> 'Eggplant',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'بامية',
              'name_en'=> 'Okra',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'بصل',
              'name_en'=> 'Onion',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'بطاطس',
              'name_en'=> 'Potato',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'بهارات مطحونة',
              'name_en'=> 'Ground spices',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'ثوم',
              'name_en'=> 'Garlic',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'خيار',
              'name_en'=> 'Cucumber',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'رز باستيل',
              'name_en'=> 'Pastel rice',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'رز علبة',
              'name_en'=> 'Box of rice',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'زنجبيل',
              'name_en'=> 'Ginger',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'طماطم',
              'name_en'=> 'Tomato',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'فلفل',
              'name_en'=> 'Pepper',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'فلفل اسود حبات',
              'name_en'=> 'Black pepper',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'فلفل حار',
              'name_en'=> 'Chili',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'فلفل رومي',
              'name_en'=> 'Bell pepper',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'قرفة',
              'name_en'=> 'Cinnamon',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'قرنفل',
              'name_en'=> 'Carnation',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'كركم',
              'name_en'=> 'Turmeric',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'كزبرة بهار',
              'name_en'=> 'Coriander Spices',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'لحم مفروم',
              'name_en'=> 'Minced meat',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'ليمون',
              'name_en'=> 'Lemon',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'ليمون أسود',
              'name_en'=> 'Black lemon',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'مرق دجاج علبة',
              'name_en'=> 'Chicken Broth Can',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'هيل',
              'name_en'=> 'Cardamom',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'زبادي كبير',
              'name_en'=> 'Large yogurt',
              'unit'=> '1/4 كيلو',
              'unit_en'=> '1/4 Kilo',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'قفاز يد',
              'name_en'=> 'Hand gloves',
              'unit'=> 'باكيت',
              'unit_en'=> 'Packet',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'كمام',
              'name_en'=> 'Mask',
              'unit'=> 'باكيت',
              'unit_en'=> 'Packet',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'لبن شراب صغير',
              'name_en'=> 'Milk small',
              'unit'=> 'باكيت',
              'unit_en'=> 'Packet',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'مرق ماجي',
              'name_en'=> 'Maggi broth',
              'unit'=> 'باكيت',
              'unit_en'=> 'Packet',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'زيت',
              'name_en'=> 'Oil',
              'unit'=> 'باكيت',
              'unit_en'=> 'Packet',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'طحينة',
              'name_en'=> 'Tahini',
              'unit'=> 'تنكة',
              'unit_en'=> 'Tank',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'خل',
              'name_en'=> 'Vinegar',
              'unit'=> 'تنكة',
              'unit_en'=> 'Tank',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'بيبسي كبير',
              'name_en'=> 'Pepsi large',
              'unit'=> 'جالون',
              'unit_en'=> 'Gallon',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'بيبسي وسط',
              'name_en'=> 'Pepsi medium',
              'unit'=> 'حبة',
              'unit_en'=> 'Piece',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'حمضيات كبير',
              'name_en'=> 'Soda Large',
              'unit'=> 'حبة',
              'unit_en'=> 'Piece',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'حمضيات وسط',
              'name_en'=> 'Soda medium',
              'unit'=> 'حبة',
              'unit_en'=> 'Piece',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'دجاج',
              'name_en'=> 'Chicken',
              'unit'=> 'حبة',
              'unit_en'=> 'Piece',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'سفن كبير',
              'name_en'=> '7up large',
              'unit'=> 'حبة',
              'unit_en'=> 'Piece',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'سفن وسط',
              'name_en'=> '7up meduim',
              'unit'=> 'حبة',
              'unit_en'=> 'Piece',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'قصدير',
              'name_en'=> 'Tin',
              'unit'=> 'حبة',
              'unit_en'=> 'Piece',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'ليفة صحون',
              'name_en'=> 'Dish loofah',
              'unit'=> 'حبة',
              'unit_en'=> 'Piece',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'مكنسة',
              'name_en'=> 'Broom',
              'unit'=> 'حبة',
              'unit_en'=> 'Piece',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'ميرندا كبير',
              'name_en'=> 'Miranda large',
              'unit'=> 'حبة',
              'unit_en'=> 'Piece',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'ميرندا وسط',
              'name_en'=> 'Miranda medium',
              'unit'=> 'حبة',
              'unit_en'=> 'Piece',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'كزبرة',
              'name_en'=> 'Coriander',
              'unit'=> 'حبة',
              'unit_en'=> 'Piece',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'منديل',
              'name_en'=> 'Tissus',
              'unit'=> 'ربطة',
              'unit_en'=> 'Tie',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'نعناع',
              'name_en'=> 'Ment',
              'unit'=> 'ربطة',
              'unit_en'=> 'Tie',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'رول تغليف',
              'name_en'=> 'Wrapping roll',
              'unit'=> 'ربطة',
              'unit_en'=> 'Tie',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'سفرة طعام',
              'name_en'=> 'Table cloth',
              'unit'=> 'شدة',
              'unit_en'=> 'Package',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'صحن ايدام صغير',
              'name_en'=> 'Small Edam Plate',
              'unit'=> 'شدة',
              'unit_en'=> 'Package',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'صحن ايدام كبير',
              'name_en'=> 'Large Edam Plate',
              'unit'=> 'شدة',
              'unit_en'=> 'Package',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'علب صغيرة',
              'name_en'=> 'Small box',
              'unit'=> 'شدة',
              'unit_en'=> 'Package',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'علب قصدير',
              'name_en'=> 'Tin box',
              'unit'=> 'شدة',
              'unit_en'=> 'Package',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'كأس بلاستيك',
              'name_en'=> 'Plastic Cup',
              'unit'=> 'شدة',
              'unit_en'=> 'Package',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'كيس صغير',
              'name_en'=> 'Small bag',
              'unit'=> 'شدة',
              'unit_en'=> 'Package',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'كيس صغير أصفر',
              'name_en'=> 'Small yellow bag',
              'unit'=> 'شدة',
              'unit_en'=> 'Package',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'كيس قمامة 50',
              'name_en'=> 'Trash bag 50',
              'unit'=> 'شدة',
              'unit_en'=> 'Package',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'كيس قمامة 55',
              'name_en'=> 'Trash bag 55',
              'unit'=> 'شدة',
              'unit_en'=> 'Package',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'كيس كبير',
              'name_en'=> 'Large bag',
              'unit'=> 'شدة',
              'unit_en'=> 'Package',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'ملاعق أكل',
              'name_en'=> 'Tablespoons',
              'unit'=> 'شدة',
              'unit_en'=> 'Package',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'صحون ستيل 55',
              'name_en'=> 'Steel Plates 55',
              'unit'=> 'شدة',
              'unit_en'=> 'Package',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'سمن فارم',
              'name_en'=> 'Margarine farm',
              'unit'=> 'صحن',
              'unit_en'=> 'Dish',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'صفار البيض',
              'name_en'=> 'Egg yolk',
              'unit'=> 'علبة',
              'unit_en'=> 'Box',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'صفار الزعفران',
              'name_en'=> 'Saffron yellow',
              'unit'=> 'علبة',
              'unit_en'=> 'Box',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'صلصة رنل',
              'name_en'=> 'Renl sauce',
              'unit'=> 'علبة',
              'unit_en'=> 'Box',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'فيري 1 لتر',
              'name_en'=> 'Fairy 1 Liter',
              'unit'=> 'علبة',
              'unit_en'=> 'Box',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'لبن شراب وسط',
              'name_en'=> 'Milk medium',
              'unit'=> 'علبة',
              'unit_en'=> 'Box',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'مبيد حشرات',
              'name_en'=> 'Insecticide',
              'unit'=> 'علبة',
              'unit_en'=> 'Box',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'مطهر أرضية',
              'name_en'=> 'Floor disinfectant',
              'unit'=> 'علبة',
              'unit_en'=> 'Box',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'ملح علب',
              'name_en'=> 'Salt cans',
              'unit'=> 'علبة',
              'unit_en'=> 'Box',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'بيبسي صغير',
              'name_en'=> 'Pepsi Small',
              'unit'=> 'علبة',
              'unit_en'=> 'Box',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'بيض',
              'name_en'=> 'Egg',
              'unit'=> 'كرتون',
              'unit_en'=> 'Carton',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'حمضيات صغير',
              'name_en'=> 'Small soda',
              'unit'=> 'كرتون',
              'unit_en'=> 'Carton',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'سفن صغير',
              'name_en'=> '7up small',
              'unit'=> 'كرتون',
              'unit_en'=> 'Carton',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'فحم 10 كيلو',
              'name_en'=> 'Charcoal 10 Kg',
              'unit'=> 'كرتون',
              'unit_en'=> 'Carton',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'ماء 3 ريال',
              'name_en'=> 'Water 3 SAR',
              'unit'=> 'كرتون',
              'unit_en'=> 'Carton',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'ماء ريال',
              'name_en'=> 'Water 1 SAR',
              'unit'=> 'كرتون',
              'unit_en'=> 'Carton',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'ماء نص',
              'name_en'=> 'Water 1/2 SAR',
              'unit'=> 'كرتون',
              'unit_en'=> 'Carton',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'معكرونة',
              'name_en'=> 'Macarone',
              'unit'=> 'كرتون',
              'unit_en'=> 'Carton',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'ميرندا صغير',
              'name_en'=> 'Miranda Small',
              'unit'=> 'كرتون',
              'unit_en'=> 'Carton',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'غطاء رأس',
              'name_en'=> 'Head cover',
              'unit'=> 'كرتون',
              'unit_en'=> 'Carton',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'قفاز استخدام واحد',
              'name_en'=> 'Single use glove',
              'unit'=> 'كيس',
              'unit_en'=> 'Sack',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'كيس حراري',
              'name_en'=> 'Thermal bag',
              'unit'=> 'كيس',
              'unit_en'=> 'Sack',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'مريول',
              'name_en'=> 'Apron',
              'unit'=> 'كيس',
              'unit_en'=> 'Sack',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'ملح كيس',
              'name_en'=> 'Salt bag',
              'unit'=> 'كيس',
              'unit_en'=> 'Sack',
              'type'=> 'supplies',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'ملوخية',
              'name_en'=> 'Molokhia',
              'unit'=> 'كيس',
              'unit_en'=> 'Sack',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ],
            [
              'name'=> 'موتو',
              'name_en'=> 'Moto',
              'unit'=> 'كيس',
              'unit_en'=> 'Sack',
              'type'=> 'food',
              'created_at'=> now(),
              'updated_at'=> now()
            ]
          ]);
    }
}
