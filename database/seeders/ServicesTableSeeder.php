<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                "data" => [
                    'name' => [
                        "en" => "Web development",
                        "ua" => "Веб-розробка"
                    ],
                    'content' => [
                        "en" => "<ul> <li><div class='d-block mb-1'><b>Custom Web Design and Responsive Development</b></div> Create visually stunning and responsive websites tailored to your brand's unique identity, ensuring seamless user experience across all devices and screen sizes.</li> <li><div class='d-block mb-1'><b>Front-end and Back-end Development</b></div> Build powerful and scalable web applications with our expert front-end and back-end development services, utilizing the latest technologies and best practices for a high-performance digital presence.</li> <li><div class='d-block mb-1'><b>Content Management System (CMS) Integration</b></div>Effortlessly manage your website content with our seamless CMS integration services, providing you with user-friendly tools to keep your site up-to-date and engaging for your audience.</li> <li><div class='d-block mb-1'><b>E-commerce Solutions and Payment Integrations</b></div> Establish a successful online store with our end-to-end e-commerce solutions and secure payment integrations, streamlining your sales process and maximizing your revenue potential.</li> <li><div class='d-block mb-1'><b>Website Optimization and SEO</b></div> Improve your website's visibility and search engine rankings with our website optimization and SEO services, driving organic traffic and increasing your online presence..</li> </ul>",
                        "ua" => "<ul> <li><div class='d-block mb-1'><b>Спеціальний дизайн та адаптивна розробка веб-сайтів</b></div> Створення візуально привабливих та адаптивних веб-сайтів, які відповідають унікальній ідентичності вашого бренду, забезпечуючи безшовний досвід користувачів на всіх пристроях та розмірах екранів.</li> <li><div class='d-block mb-1'><b>Розробка клієнтської та серверної частин веб-додатків</b></div> Створення потужних та масштабованих веб-додатків з використанням останніх технологій та найкращих практик для високопродуктивного цифрового присутності.</li> <li><div class='d-block mb-1'><b>Інтеграція систем управління контентом (CMS)</b></div> Легко керуйте контентом вашого веб-сайту з нашими безшовними послугами інтеграції CMS, що надає вам зручні інструменти для підтримки актуальності та привабливості вашого сайту для аудиторії.</li> <li><div class='d-block mb-1'><b>Рішення для електронної комерції та інтеграція платежів</b></div> Створення успішного онлайн-магазину з нашими комплексними рішеннями для електронної комерції та безпечною інтеграцією платежів, що спрощує процес продажу та максимізує потенціал вашого доходу.</li> <li><div class='d-block mb-1'><b>Оптимізація веб-сайту та SEO</b></div> Покращуйте видимість вашого веб-сайту та рейтинги пошукових систем за допомогою наших послуг з оптимізації веб-сайту та SEO, що забезпечують органічний трафік та збільшення вашої онлайн-присутності...</li> </ul>"
                    ],
                    'description' => [
                        "en" => "Transform your digital presence with our all-inclusive web development services, featuring tailored design, robust e-commerce integration, and effective SEO strategies. Trust our experienced team to bring your online goals to fruition.",
                        "ua" => "Трансформуйте свою цифрову присутність з нашими всеосяжними послугами веб-розробки, що включають спеціальний дизайн, потужну інтеграцію електронної комерції та ефективні стратегії SEO. Довіртеся нашій досвідченій команді, щоб втілити ваші онлайн-цілі в реальність."
                    ]
                ],
                "meta" => [
                    'title' => [
                        "en" => "Web Development | Custom Design, E-commerce Solutions, CMS & SEO",
                        "ua" => "Веб-розробка | Спеціальний дизайн, рішення для електронної комерції, система управління контентом та SEO"
                    ],
                    'description' => [
                        "en" => "Comprehensive web development services, encompassing custom design, front-end and back-end development, CMS integration, e-commerce solutions, and website optimization for enhanced SEO performance.",
                        "ua" => "Комплексні послуги з веб-розробки, що охоплюють спеціальний дизайн, розробку клієнтської та серверної частин, інтеграцію систем управління контентом, рішення для електронної комерції та оптимізацію веб-сайту для покращення показників SEO."
                    ],
                    'keywords' => [
                        "en" => "web development, custom web design, responsive development, front-end development, back-end development, CMS, content management system, e-commerce solutions, payment integrations, website optimization, SEO",
                        "ua" => "розробка веб-сайтів, спеціальний дизайн, адаптивна розробка, розробка клієнтської частини, розробка серверної частини, система управління контентом, управління контентом, рішення для електронної комерції, інтеграція платежів, оптимізація веб-сайту, пошукова оптимізація, SEO"
                    ],
                    'slug' => 'web'
                ]
            ],
            [
                "data" => [
                    'name' => [
                        "en" => "Blockchain development",
                        "ua" => "Блокчейн розробка"
                    ],
                    'content' => [
                        "en" => "<ul> <li><div class='d-block mb-1'><b>Smart Contract and DApp Development:</b></div> Develop secure and efficient smart contracts and decentralized applications (DApps) to power your blockchain-based platform, tailored to meet your specific needs and requirements. </li> <li><div class='d-block mb-1'><b>Token Creation and DeFi Solutions:</b></div> Create custom tokens and enable decentralized finance (DeFi) solutions for your project, enhancing liquidity and unlocking new financial opportunities on the blockchain</li> <li><div class='d-block mb-1'><b>Blockchain Security:</b></div> Ensure the highest level of security and stability for your blockchain platform with our cutting-edge security measures, preventing vulnerabilities and safeguarding your asset </li> <li><div class='d-block mb-1'><b>Payment Provider Integrations for NFTs:</b></div> Seamlessly integrate top payment providers like <a href='https://www.ramper.xyz/' target='_blank'>ramper.xyz</a>, <a href='https://withpaper.com' target='_blank'>withpaper.com</a>, <a href='https://crossmint.com' target='_blank'>crossmint.com</a>, and <a href='https://nftpay.xyz' target='_blank'>nftpay.xyz</a>, enabling your users to purchase NFTs with ease using credit or debit cards, for a smooth and enjoyable customer experience. </li> </ul>",
                        "ua" => "<ul> <li><div class='d-block mb-1'><b>Розробка розумних контрактів та децентралізованих додатків (DApp):</b></div> Розробка безпечних та ефективних розумних контрактів та децентралізованих додатків (DApp), що працюють на вашій блокчейн-платформі, спеціально налаштованих на задоволення вашої специфічної потреби та вимог. </li> <li><div class='d-block mb-1'><b>Створення токенів та розв'язання DeFi:</b></div> Створення власних токенів та можливість використання рішень в галузі децентралізованої фінансової технології (DeFi) для вашого проекту, що покращує ліквідність та відкриває нові фінансові можливості на блокчейні. </li> <li><div class='d-block mb-1'><b>Безпека блокчейну:</b></div> Забезпечення найвищого рівня безпеки та стабільності для вашої блокчейн-платформи за допомогою сучасних заходів безпеки, що запобігають вразливостям та захищають ваші активи. </li> <li><div class='d-block mb-1'><b>Інтеграції платіжних провайдерів для NFT:</b></div> Безперешкодно інтегруйте провідних платіжних провайдерів, таких як <a href='https://www.ramper.xyz/' target='_blank'>ramper.xyz</a>, <a href='https://withpaper.com' target='_blank'>withpaper.com</a>, <a href='https://crossmint.com' target='_blank'>crossmint.com</a>, та <a href='https://nftpay.xyz' target='_blank'>nftpay.xyz</a>, дозволяючи вашим користувачам легко придбати NFT за допомогою кредитних або дебетових карток, для плавного та приємного використання. </li> </ul>"
                    ],
                    'description' => [
                        "en" => "Discover our comprehensive blockchain development services, designed to help you build a robust and secure platform with smart contracts, DeFi solutions, and seamless NFT payment integrations. Our expert team is ready to bring your vision to life.",
                        "ua" => "Дізнайтеся про наші комплексні послуги з розробки блокчейну, призначені для допомоги у створенні міцної та безпечної платформи з розумними контрактами, рішеннями DeFi та безшовною інтеграцією оплати NFT. Наша команда експертів готова втілити вашу ідею в життя."
                    ]
                ],
                "meta" => [
                    'title' => [
                        "en" => "Blockchain Development | Smart Contracts, DeFi Solutions, & NFT Payment Integrations",
                        "ua" => "Розробка блокчейну | Розумні контракти, рішення DeFi та інтеграції оплати NFT"
                    ],
                    'description' => [
                        "en" => "Specialized blockchain development services, covering smart contracts, DApp development, token creation, DeFi solutions, blockchain security, and smooth NFT payment provider integrations.",
                        "ua" => "Спеціалізовані послуги розробки блокчейну, які охоплюють розробку смарт-контрактів, DApp, створення токенів, DeFi рішень, блокчейн безпеку та інтеграцію платіжних провайдерів NFT без перешкод."
                    ],
                    'keywords' => [
                        "en" => "blockchain development, smart contracts, DApps, decentralized applications, token creation, DeFi, decentralized finance, blockchain security, NFT, payment provider integrations",
                        "ua" => "розробка блокчейн, розумні контракти, DApps, децентралізовані додатки, створення токенів, DeFi, децентралізована фінансія, безпека блокчейн, NFT, інтеграція платіжних провайдерів"],
                    'slug' => 'blockchain'
                ]
            ],
            [
                "data" => [
                    'name' => [
                        "en" => "Mobile App development",
                        "ua" => "Розробка мобільних додатків"
                    ],
                    'content' => [
                        "en" => "<ul> <li><div class='d-block mb-1'><b>Custom Mobile App Design and Development</b></div> Design and develop tailor-made mobile apps that captivate users and perfectly align with your brand's vision, ensuring a seamless and engaging experience.</li> <li><div class='d-block mb-1'><b>iOS and Android App Development</b></div> Create high-quality, native iOS and Android apps with our expert development services, leveraging the latest technologies and best practices for optimal performance on both platforms.</li> <li><div class='d-block mb-1'><b>Cross-Platform App Development</b></div>Maximize your app's reach with cross-platform development, ensuring consistent functionality and user experience across a variety of devices and operating systems.</li> <li><div class='d-block mb-1'><b>Mobile App Integration and Optimization:</b></div>Seamlessly integrate your mobile app with existing systems and optimize its performance for a fast, reliable, and enjoyable user experience.</li><li><div class='d-block mb-1'><b>App Store Optimization and Marketing</b></div>Seamlessly integrate your mobile app with existing systems and optimize its performance for a fast, reliable, and enjoyable user experience.</li> </ul>",
                        "ua" => "<ul> <li><div class='d-block mb-1'><b>Індивідуальний дизайн та розробка мобільних додатків</b></div> Розробляйте та створюйте мобільні додатки на замовлення, які захоплюють користувачів і ідеально відповідають візії вашого бренду, забезпечуючи плавний та захоплюючий досвід.</li> <li><div class='d-block mb-1'><b>Розробка додатків для iOS та Android</b></div> Створюйте якісні, рідні додатки для iOS та Android з нашими експертними послугами розробки, використовуючи найновіші технології та кращі практики для оптимальної роботи на обох платформах.</li> <li><div class='d-block mb-1'><b>Розробка крос-платформених додатків</b></div> Максимізуйте охоплення вашого додатка за допомогою крос-платформеної розробки, забезпечуючи послідовний функціонал та користувацький досвід на різних пристроях та операційних системах.</li> <li><div class='d-block mb-1'><b>Інтеграція та оптимізація мобільних додатків:</b></div> Безшовно інтегруйте ваш мобільний додаток з існуючими системами та оптимізуйте його роботу для швидкого, надійного та приємного користувацького досвіду.</li> <li><div class='d-block mb-1'><b>Оптимізація додатків у магазинах та маркетинг</b></div> Безшовно інтегруйте ваш мобільний додаток з існуючими системами та оптимізуйте його роботу для швидкого, надійного та приємного користувацького досвіду.</li> </ul>"
                    ],
                    'description' => [
                        "en" => "Empower your business with our comprehensive mobile app development services, delivering captivating custom design, versatile platform support, seamless integration, and effective app store marketing strategies. Let our experts turn your ideas into top-performing apps.",
                        "ua" => "Надайте своєму бізнесу потужність завдяки нашим комплексним послугам розробки мобільних додатків, які включають захоплюючий індивідуальний дизайн, підтримку різних платформ, безперебійну інтеграцію та ефективні стратегії маркетингу в магазині додатків. Дозвольте нашим експертам перетворити ваші ідеї на додатки з високою продуктивністю."
                    ]
                ],
                "meta" => [
                    'title' => [
                        "en" => "Mobile App Development | Bespoke Design for iOS & Android Apps",
                        "ua" => "Розробка Мобільних Додатків | Індивідуальний Дизайн для Додатків на iOS та Android"
                    ],
                    'description' => [
                        "en" => "Professional mobile app development services, featuring custom design, iOS and Android development, cross-platform solutions, app integration, optimization, and strategic app store marketing.",
                        "ua" => "Ми надаємо професійні послуги розробки мобільних додатків з індивідуальним дизайном, розробкою на iOS та Android, крос-платформними рішеннями, інтеграцією додатків, оптимізацією та стратегічним маркетингом в магазинах додатків."
                    ],
                    'keywords' => [
                        "en" => "mobile app development, custom app design, iOS app development, Android app development, cross-platform, app integration, app optimization, app store optimization, app marketing",
                        "ua" => "розробка мобільних додатків, індивідуальний дизайн додатків, розробка додатків для iOS, розробка додатків для Android, крос-платформа, інтеграція додатків, оптимізація додатків, оптимізація в магазині додатків, маркетинг додатків"
                    ],
                    'slug' => "mobile-app"
                ]
            ]
        ];

        foreach ($services as $item) {
            $service = Service::create($item['data']);

            $service->meta()->create([
                'title' => $item['meta']['title'],
                'description' => $item['meta']['description'],
                'keywords' => $item['meta']['keywords'],
                'slug' => $item['meta']['slug']
            ]);
        }
    }
}
