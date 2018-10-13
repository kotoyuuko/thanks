## Thanks

一个 PHP 写的在线要饭系统，使用有赞的支付接口。

## Deploy

#### 开通微小店

去这里注册并开通小店：[https://h5.youzan.com/v2/index/wxdpc](https://h5.youzan.com/v2/index/wxdpc )

手机下载客户端开通，不是微商城！是微小店，免费的！

#### 注册有赞云

去这里注册个人开发者：[https://www.youzanyun.com](https://www.youzanyun.com)

然后创建自用型应用，填写应用名称，下一步，选择你上面开通的小店名称并完成授权绑定。

> 注意：这里绑定应用的时候是没有微小店选项的，填写完应用名称后下一步是店铺授权，就有你手机上创建的微小店名称可选的。

#### 下载代码

    git clone https://github.com/kotoyuuko/thanks.git /var/www/thanks

然后把 `nginx` 啥的配好，这里就不浪费文字说明了。

#### 建立数据库

使用 `mysql` 命令行工具或 `phpMyAdmin` 建好数据库用户和数据库。

#### 配置程序

把 `.env.example` 重命名为 `.env`，然后打开 `.env`，编辑如下的配置：

    // 应用 URL
    APP_URL=http://localhost

    // 数据库信息，自己看着来
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret

    // 有赞的接口配置
    YOUZAN_CLIENT_ID=
    YOUZAN_CLIENT_SECRET=
    YOUZAN_STORE_ID=

    // 你的名字
    MY_NAME=

#### 安装程序

    php artisan key:generate
    php artisan migrate
    php artisan cache:clear
    php artisan config:cache
    php artisan route:cache
    php artisan view:clear
    php artisan storage:link

#### 生成前端资源

先去装个 yarn，然后：

    yarn

如果用的是国内服务器建议走淘宝的镜像：

    yarn config set registry https://registry.npm.taobao.org
    SASS_BINARY_SITE=http://npm.taobao.org/mirrors/node-sass yarn

#### 添加计划任务

    crontab -u www -e

添加下面的任务：

    * * * * * /usr/bin/php7.2 /var/www/thanks/artisan schedule:run >> /dev/null 2>&1

#### 测试

然后自己测试一下吧，有问题欢迎 `issue`～

## License

[MIT license](https://opensource.org/licenses/MIT).
