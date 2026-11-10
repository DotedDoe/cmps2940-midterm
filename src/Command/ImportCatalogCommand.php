<?php

namespace App\Command;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:catalog:import',
    description: 'Import Cookie Time products into the database'
)]
class ImportCatalogCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $io = new SymfonyStyle($input, $output);

        $products = [
            [
                'slug' => 'choc-chip-cookie',
                'name' => 'Sugar Cookie',
                'price' => '2.50',
                'category' => 'cookies',
                'image' => 'images-for-website/base.png',
                'description' => 'A classic bakery cookie loaded with semi-sweet chocolate chips, crisp on the edges and soft in the middle.',
                'nutrition' => [
                    'servingSize' => '1 cookie (60g)',
                    'calories' => 280,
                    'fat' => '14g',
                    'carbs' => '36g',
                    'sugar' => '20g',
                    'protein' => '3g',
                    'allergens' => ['Wheat', 'Egg', 'Dairy', 'May contain traces of nuts']
                ],
                'customizable' => [
                    'label' => 'Choose toppings',
                    'options' => [
                        ['id' => 'sprinkles', 'name' => 'Sprinkles', 'priceAdd' => 0.25],
                        ['id' => 'mm', 'name' => 'M&Ms', 'priceAdd' => 0.50],
                        ['id' => 'icing', 'name' => 'Icing Drizzle', 'priceAdd' => 0.50]
                    ]
                ]
            ],
            [
                'slug' => 'fudge-brownie',
                'name' => 'Fudge Brownie',
                'price' => '3.00',
                'category' => 'brownies',
                'image' => 'images-for-website/slop.png',
                'description' => 'Dense, fudgy, and rich with cocoa — baked in small batches so the center stays gooey.',
                'nutrition' => [
                    'servingSize' => '1 brownie (70g)',
                    'calories' => 340,
                    'fat' => '18g',
                    'carbs' => '42g',
                    'sugar' => '28g',
                    'protein' => '4g',
                    'allergens' => ['Wheat', 'Egg', 'Dairy', 'Soy']
                ],
                'customizable' => [
                    'label' => 'Choose toppings',
                    'options' => [
                        ['id' => 'walnuts', 'name' => 'Walnuts', 'priceAdd' => 0.50],
                        ['id' => 'caramel', 'name' => 'Caramel Drizzle', 'priceAdd' => 0.50],
                        ['id' => 'sea-salt', 'name' => 'Sea Salt', 'priceAdd' => 0.25]
                    ]
                ]
            ],
            [
                'slug' => 'sourdough-loaf',
                'name' => 'Sourdough Loaf',
                'price' => '6.50',
                'category' => 'breads',
                'image' => 'images-for-website/sourdough.png',
                'description' => 'Naturally leavened with our house starter, fermented for 24 hours for a tangy flavor and chewy crumb.',
                'nutrition' => [
                    'servingSize' => '1 slice (50g)',
                    'calories' => 130,
                    'fat' => '0.5g',
                    'carbs' => '26g',
                    'sugar' => '1g',
                    'protein' => '5g',
                    'allergens' => ['Wheat']
                ],
                'customizable' => null
            ],
            [
                'slug' => 'carrot-cake-slice',
                'name' => 'Carrot Cake Slice',
                'price' => '4.25',
                'category' => 'cakes',
                'image' => 'images-for-website/ai-gen-slop.png',
                'description' => 'Moist spiced cake packed with shredded carrots and walnuts, topped with cream cheese frosting.',
                'nutrition' => [
                    'servingSize' => '1 slice (120g)',
                    'calories' => 410,
                    'fat' => '22g',
                    'carbs' => '48g',
                    'sugar' => '34g',
                    'protein' => '5g',
                    'allergens' => ['Wheat', 'Egg', 'Dairy', 'Tree Nuts']
                ],
                'customizable' => null
            ],
            [
                'slug' => 'blueberry-muffin',
                'name' => 'Blueberry Muffin',
                'price' => '3.25',
                'category' => 'breads',
                'image' => 'images-for-website/blueberry-muffin.png',
                'description' => 'A tender, bakery-style muffin studded with fresh blueberries and finished with a crunchy sugar top.',
                'nutrition' => [
                    'servingSize' => '1 muffin (95g)',
                    'calories' => 320,
                    'fat' => '12g',
                    'carbs' => '48g',
                    'sugar' => '26g',
                    'protein' => '4g',
                    'allergens' => ['Wheat', 'Egg', 'Dairy']
                ],
                'customizable' => null
            ],
            [
                'slug' => 'cinnamon-roll',
                'name' => 'Cinnamon Roll',
                'price' => '4.00',
                'category' => 'breads',
                'image' => 'images-for-website/cinnamon-roll.png',
                'description' => 'Soft, pull-apart layers swirled with brown sugar and cinnamon, finished with a warm vanilla glaze.',
                'nutrition' => [
                    'servingSize' => '1 roll (110g)',
                    'calories' => 430,
                    'fat' => '17g',
                    'carbs' => '62g',
                    'sugar' => '31g',
                    'protein' => '6g',
                    'allergens' => ['Wheat', 'Egg', 'Dairy']
                ],
                'customizable' => [
                    'label' => 'Choose add-ons',
                    'options' => [
                        ['id' => 'extra-glaze', 'name' => 'Extra Glaze', 'priceAdd' => 0.50],
                        ['id' => 'pecans', 'name' => 'Chopped Pecans', 'priceAdd' => 0.75]
                    ]
                ]
            ],
            [
                'slug' => 'red-velvet-cupcake',
                'name' => 'Red Velvet Cupcake',
                'price' => '3.50',
                'category' => 'cakes',
                'image' => 'images-for-website/red-velvet-cupcake.png',
                'description' => 'A cocoa-kissed cupcake with a hint of tang, topped with a swirl of cream cheese frosting.',
                'nutrition' => [
                    'servingSize' => '1 cupcake (85g)',
                    'calories' => 350,
                    'fat' => '16g',
                    'carbs' => '46g',
                    'sugar' => '32g',
                    'protein' => '3g',
                    'allergens' => ['Wheat', 'Egg', 'Dairy']
                ],
                'customizable' => null
            ],
            [
                'slug' => 'chocolate-muffin',
                'name' => 'Chocolate Muffin',
                'price' => '4.00',
                'category' => 'breads',
                'image' => 'images-for-website/choco-muffin.png',
                'description' => 'A bakery style muffin with cocoa and chocolate chips both inside and outside.',
                'nutrition' => [
                    'servingSize' => '1 muffin(95g)',
                    'calories' => 320,
                    'fat' => '12g',
                    'carbs' => '48g',
                    'sugar' => '26g',
                    'protein' => '4g',
                    'allergens' => ['Wheat', 'Egg', 'Dairy']
                ],
                'customizable' => null
            ]
        ];

        foreach ($products as $data) {
            $product = $this->entityManager
                ->getRepository(Product::class)
                ->findOneBy(['slug' => $data['slug']]);

            if (!$product) {
                $product = new Product();
                $this->entityManager->persist($product);
            }

            $product
                ->setSlug($data['slug'])
                ->setName($data['name'])
                ->setPrice($data['price'])
                ->setCategory($data['category'])
                ->setImage($data['image'])
                ->setDescription($data['description'])
                ->setNutrition($data['nutrition'])
                ->setCustomizable($data['customizable']);
        }

        $this->entityManager->flush();

        $io->success('Successfully imported ' . count($products) . ' products.');

        return Command::SUCCESS;
    }
}