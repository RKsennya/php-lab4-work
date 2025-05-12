<?php
//определение ассоциативного массива транзакций
$transactions = [
    [
        "transaction_id" => 1, // id
        "transaction_date" => "2019-01-01", // дата
        "transaction_amount" => 100.00, // сумма транзакции
        "transaction_description" => "Payment for groceries", // описание
        "merchant_name" => "SuperMart", // название организации
    ],
    [
        "transaction_id" => 2,
        "transaction_date" => "2020-02-15",
        "transaction_amount" => 75.50,
        "transaction_description" => "Dinner with friends",
        "merchant_name" => "Local Restaurant",
    ],
    [
        "transaction_id" => 3,
        "transaction_date" => "2020-02-18",
        "transaction_amount" => 88.50,
        "transaction_description" => "Books",
        "merchant_name" => "Book Shop",
    ],
    [
        "transaction_id" => 4,
        "transaction_date" => "2020-02-22",
        "transaction_amount" => 125.00,
        "transaction_description" => " Flowers",
        "merchant_name" => "Garden stuff",
    ],
];
/*Создайте функции:
calculateTotalAmount для подсчёта общей суммы транзакций:
calculateAverage для вычисления среднего значения транзакций:
mapTransactionDescriptions для создания массива описаний транзакций:*/

function calculateTotalAmount($transactions) {
    return array_reduce($transactions, function($carry, $item) {
        return $carry + $item["transaction_amount"];
    }, 0);
}

function calculateAverage($transactions) {
    $total = calculateTotalAmount($transactions);
    return $total / count($transactions);
}

function mapTransactionDescriptions($transactions) {
    return array_map(function($transaction) {
        return $transaction["transaction_description"];
    }, $transactions);
}

$totalAmount = calculateTotalAmount($transactions);
$averageAmount = calculateAverage($transactions);
$descriptions = mapTransactionDescriptions($transactions);
?>

<h2>Таблица транзакций</h2>
<table border="1">
    <tr style="background-color: #a6a6a6; color: #252525">
        <th colspan="5">Транзакции</th>
    </tr>
    <tr style="background-color: #a6a6a6; color: #252525">
        <th>ID</th>
        <th>Дата</th>
        <th>Сумма транзакции</th>
        <th>Описание транзакции</th>
        <th>Название организации</th>
    </tr>
    <?php
    foreach ($transactions as $transaction) { ?>
        <tr>
            <td><?php echo $transaction["transaction_id"]; ?></td>
            <td><?php echo $transaction["transaction_date"]; ?></td>
            <td><?php echo $transaction["transaction_amount"]; ?></td>
            <td><?php echo $transaction["transaction_description"]; ?></td>
            <td><?php echo $transaction["merchant_name"]; ?></td>
        </tr>
    <?php } ?>
</table>

<h3>Итоги:</h3>
<p>Общая сумма транзакций: <?php echo $totalAmount; ?></p>
<p>Средняя сумма транзакции: <?php echo $averageAmount; ?></p>

<h3>Описания транзакций:</h3>
<ul>
    <?php foreach ($descriptions as $description) { ?>
        <li><?php echo $description; ?></li>
    <?php } ?>
</ul>



<?php
/*Дополнительное задание
Добавьте класс Transaction с полями:
id, date, amount, description, merchant.
Создайте массив объектов класса Transaction.
Реализуйте методы для подсчёта общей суммы и среднего значения транзакций.
Вместо массива в пункте 4 определите массив из объектов класса.*/

class Transaction {
    public $id;
    public $date;
    public $amount;
    public $description;
    public $merchant;

    public function __construct($id, $date, $amount, $description, $merchant) {
        $this->id = $id;
        $this->date = $date;
        $this->amount = $amount;
        $this->description = $description;
        $this->merchant = $merchant;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'amount' => $this->amount,
            'description' => $this->description,
            'merchant' => $this->merchant
        ];
    }
}

$transactionObjects = [
    new Transaction(1, "2019-01-01", 100.00, "Payment for groceries", "SuperMart"),
    new Transaction(2, "2020-02-15", 75.50, "Dinner with friends", "Local Restaurant"),
    new Transaction(3, "2020-02-18", 88.50, "Books", "Book Shop"),
    new Transaction(4, "2020-07-10", 125.00, "Flowers", "Garden stuff"),
];


function calculateTotalAmountObjects($transactions) {
    $total = 0;
    foreach ($transactions as $transaction) {
        $total += $transaction->amount;
    }
    return $total;
}

function calculateAverageObjects($transactions) {
    $total = calculateTotalAmountObjects($transactions);
    return $total / count($transactions);
}

$totalAmountObjects = calculateTotalAmountObjects($transactionObjects);
$averageAmountObjects = calculateAverageObjects($transactionObjects);
?>

<h2>Таблица транзакций (объекты)</h2>
<table border="1">
    <tr style="background-color: #a6a6a6; color: #252525">
        <th colspan="5">Транзакции</th>
    </tr>
    <tr style="background-color: #a6a6a6; color: #252525">
        <th>ID</th>
        <th>Дата</th>
        <th>Сумма транзакции</th>
        <th>Описание транзакции</th>
        <th>Название организации</th>
    </tr>
    <?php
    foreach ($transactionObjects as $transaction) { ?>
        <tr>
            <td><?php echo $transaction->id; ?></td>
            <td><?php echo $transaction->date; ?></td>
            <td><?php echo $transaction->amount; ?></td>
            <td><?php echo $transaction->description; ?></td>
            <td><?php echo $transaction->merchant; ?></td>
        </tr>
    <?php } ?>
</table>

<h3>Итоги (объекты):</h3>
<p>Общая сумма транзакций: <?php echo $totalAmountObjects; ?></p>
<p>Средняя сумма транзакции: <?php echo $averageAmountObjects; ?></p>
