Blog项目环境及配置要求：
1、本地要有php环境，
- PHP >= 5.5.9
- OpenSSL PHP 扩展 
- PDO PHP 扩展 
- Mbstring PHP 扩展 
- Tokenizer PHP 扩展 
2、数据库用postgresql(也可以根据自己需要更改，具体看下面的5、6步)

3、从PHP5.4 版本开始，PHP 就已经内置了一个 web server，并且，Laravel 的 artisan 命令也支持这个内置web server，所以如果只是看效果，可以暂时不用其他web服务器。当然，如果要部署到生产服务器上的话，还是要安装 apache 或 nginx 之类的 web server 的。



启动Blog项目步骤:
1、将项目下载或克隆到本地，放到任意目录下。我们假定解压到E盘的根目录下，最终路径为：E:\Blog\laravel

2、打开命令行窗口，并cd到Laravel安装目录： cd  E:\Blog\laravel

3、输入并执行 php artisan serve 指令，如果看到有提示：Laravel development server started on http://localhost:8000/,说明Laravel跑起来了(成功了一半)

4、打开浏览器，在地址栏输入http://localhost:8000/auth/login 可以看到登录页面(如果看不到，不要急，说明是数据库配置的问题)

5、数据库是用postgresql，项目连接数据库的配置文件在Blog/laravel/config/database.php上，自己的数据库配置可以根据需要相应改变，以下是你可以改变的配置：
	(1)29行：'default' => env('DB_CONNECTION', 'pgsql')
	(2)67~76行左右： 'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => env('DB_HOST', 'localhost'),
            'database' => env('DB_DATABASE', 'blog'),
            'username' => env('DB_USERNAME', 'postgres'),
            'password' => env('DB_PASSWORD', 'yuli'),
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
        ],


6、还有laravel目录下的.env文件也要改下配置
	(1)、5~8行  DB_HOST=localhost
				DB_DATABASE=blog
				DB_USERNAME=postgres
				DB_PASSWORD=yuli

7、然而现在我们的数据库里还没有数据表，不用担心，我们在项目中已经写好了一些表(laravel/database/migration下的*_table.php即是)，只需要执行数据迁移即可：在laravel目录下执行命令：php artisan migrate，如果出现了Migration table created successfully，那么数据迁移成功。你可以看看自己的数据库里有没有出现相应的表。

8、现在数据库是空的，可以进行数据填充测试php artisan db:seed，打开浏览器，在地址栏输入http://localhost:8000/auth/login 可以看到登录页面，然后可以注册账号，记住自己的邮箱和密码，就可以愉快地玩耍了

9、登录后台管理系统，只需在地址栏输入http://localhost:8000,它会自动跳到http://localhost:8000/#/index页面，你可以登录系统，用户名是yuli@126.com,密码是yuliyuli(数据填充时分配的，所以使用前必须先进行数据填充：php artisan db:seed --class=AdminTableSeeder)。登录后可以对博客里的数据表进行增删查等操作。后台管理员只有一个，由于后台用户验证使用js模仿php的session,但是不如session,所以注意每次登陆后都要正确按退出按钮退出，不然可能存在安全问题。

(有任何问题可以与我取得联系，邮箱：yulizoe@qq.com)