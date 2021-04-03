php artisan make:migration create_demos_table --create=demos: 创建Laravel数据表
php artisan migrate: 迁移数据
php artisan make:controller DemoController: 创建控制器
php artisan make:model Demo: 创建模型

php artisan make:resource Demo: 创建快速建立模型和 JSON 返回数据之间的桥梁
php artisan key:generate: 创建接口密钥
composer update --no-scripts: 跳过 composer.json 文件中定义的脚本
php artisan view:clear: 视图缓存
php artisan cache:clear: 清除运行缓存
php artisan config:clear: 清除配置缓存
php artisan make:mail Demo: 创建邮件资源
php artisan storage:link: 在public文件夹下创建storage文件夹快捷路径

后端操作的表，前序加b_，back-end缩写
前端操作的表，前序加f_，front-end缩写
