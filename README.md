## phpのversion
```
~ % php -v
PHP 7.4.33 (cli) (built: Sep 27 2024 12:56:02) ( NTS )
Copyright (c) The PHP Group
Zend Engine v3.4.0, Copyright (c) Zend Technologies
    with Zend OPcache v7.4.33, Copyright (c), by Zend Technologies

```

## composerのversion
```
~ % composer -v
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 2.2.24 2024-06-10 22:51:52

```

## php実行コマンド
`php -S localhost:8080/`
※/以降は任意のパスを入れる

## CURLコマンド（POST application/json）
curl -X POST -H "Content-Type: application/json" -d '{"message":"hello"}' http://localhost:8080/
