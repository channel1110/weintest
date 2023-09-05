<?php
$conn = pg_connect('host=localhost port=5432 dbname=myproject user=postgres password=12345678');

if (!$conn) { // 연결 실패 시 에러 메시지 출력
    echo "에러: PostgreSQL 데이터베이스에 연결할 수 없습니다.\n";
    exit;
}

$query = 'SELECT 1'; // 간단한 쿼리를 작성합니다.
$result = pg_query($conn, $query); // 쿼리를 실행합니다.

if (!$result) { // 쿼리 실행 실패 시 에러 메시지 출력
    echo "에러: 쿼리를 실행할 수 없습니다.\n";
    pg_close($conn);
    exit;
}

// 쿼리 결과 출력
while ($row = pg_fetch_row($result)) {
    echo "결과: $row[0]\n";
}

// 연결 종료
pg_close($conn);
?>
