<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body class="bg-primary">

    <div class="container  text-white p-3">
        <div class="row justify-content-center mb-3">

            <table class="table table-hover">

                <?php

                $products = [
                    [
                        'name' => 'Laptop',
                        'price' => 15000,
                        'quantity' => 3
                    ],
                    [
                        'name' => 'Smartphone',
                        'price' => 8000,
                        'quantity' => 5
                    ],
                    [
                        'name' => 'Headphones',
                        'price' => 1200,
                        'quantity' => 10
                    ]
                ];

                $table_heads = array_keys($products[0]);

                echo
                "<thead>
                    <tr> 
                    <th scope='col'>#</th>";
                foreach ($table_heads as $table_head)
                    echo  "<th scope='col'>$table_head</th>";

                echo "</tr>
                </thead>";


                foreach ($products as $key => $product) {
                    $number = $key+1;
                    echo "<tbody>
                            <tr>
                              <th scope='row'>$number</th> ";
                    foreach ($product as $product_details)
                        echo "<td>$product_details</td>";

                    echo "
                            </tr>
                          </tbody>";
                }
                ?>



            </table>
        </div>
    </div>

</body>

</html>