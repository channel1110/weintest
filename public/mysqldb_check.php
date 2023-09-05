<?php
// MySQL 데이터베이스 연결 정보 입력
$host = "localhost";
$dbname = "myproject";
$user = "root";
$password = "12345678";

// MySQL 데이터베이스 연결
$conn = new mysqli($host, $user, $password, $dbname);

// 연결 오류 확인
if ($conn->connect_error) {
    die("에러: 데이터베이스에 연결할 수 없습니다. " . $conn->connect_error);
}

// 간단한 쿼리 작성
$query = "SELECT 1";

// 쿼리 실행
$result = $conn->query($query);

// 쿼리 결과 출력
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "결과: " . $row[1] . "\n";
    }
} else {
    echo "0 결과\n";
}

// 연결 종료
$conn->close();
?>