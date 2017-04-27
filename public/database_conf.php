<?php
// 데이터 베이스 설정
$dbServer = '127.0.0.1';
$dbUser   = 'root';
$dbPass   = '';
$dbName   = 'main';

# MySQL 용 DSN 문자열입니다.
$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";
# SQLite 용 DSN 문자열 입니다.
//$dsn = "sqlite:../../../../data/sqlite/sample.db";
