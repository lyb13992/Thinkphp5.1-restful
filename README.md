ThinkPHP 5.1 —— restfulapi
===============


## 简介

-  简单的restful风格，有好的改进建议请联系我，邮箱mail@lvyabin.com

## 目录结构

初始的目录结构如下：

~~~
www  WEB部署目录（或者子目录）
├─application                   应用目录
│  ├─common                     公共模块目录
│  ├─home                       命令行定义文件（可做定时任务）
│  ├─api                        接口目录
│  │  ├─controller              控制器目录
│  │  │  ├─v1                   版本1目录
│  │  │  ├─v2                   版本2目录 
│  │  ├─model                   模型目录
│  │  └─ ...                    更多类库目录
│  │
│  ├─command.php                命令行定义文件
│  ├─common.php                 公共函数文件
│  └─tags.php                   应用行为扩展定义文件
│
├─config                        应用配置目录
│  ├─api                        模块配置目录
│  │  ├─database.php            数据库配置
│  │  ├─cache                   缓存配置
│  │  └─ ...            
│  │
│  ├─app.php                    应用配置
│  ├─cache.php                  缓存配置
│  ├─cookie.php                 Cookie配置
│  ├─database.php               数据库配置
│  ├─log.php                    日志配置
│  ├─session.php                Session配置
│  ├─template.php               模板引擎配置
│  └─trace.php                  Trace配置
│
├─route                         路由定义目录
│  ├─route.php                  路由定义
│  └─...                        更多
│
├─public                        WEB目录（对外访问目录）
│  ├─index.php                  入口文件
│  ├─router.php                 快速测试文件
│  └─.htaccess                  用于apache的重写
│
├─thinkphp                      框架系统目录
│  ├─lang                       语言文件目录
│  ├─library                    框架类库目录
│  │  ├─think                   Think类库包目录
│  │  └─traits                  系统Trait目录
│  │
│  ├─tpl                        系统模板目录
│  ├─base.php                   基础定义文件
│  ├─console.php                控制台入口文件
│  ├─convention.php             框架惯例配置文件
│  ├─helper.php                 助手函数文件
│  ├─phpunit.xml                phpunit配置文件
│  └─start.php                  框架入口文件
│
├─extend                        扩展类库目录
│  ├─controller
│  ├─  └─BasicApi.php           授权基类
│  ├─
│  ├─Exception  
│  ├─  └─Exception.php          异常处理
│  ├─
│  ├─service
│  ├─  ├─HttpService.php        HTTP请求处理
│  ├─  └─LogService.php         LOG日志处理
│  ├─
│  ├─traits
│  ├─  └─Send.php               返回格式 数据返回类,可以直接接口返回code message data格式的数据，并且格式化为字符串
│  └─util                       封装工具类目
│
├─runtime                       应用的运行时目录（可写，可定制）
├─vendor                        第三方类库目录（Composer依赖库）
├─.env                          环境变量定义文件
├─build.php                     自动生成定义文件（参考）
├─composer.json                 composer 定义文件
├─LICENSE.txt                   授权说明文件
├─README.md                     README 文件
├─think                         命令行入口文件
~~~

