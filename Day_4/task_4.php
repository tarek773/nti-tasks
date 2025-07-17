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

                $employees = [
                    [
                        "name" => "Ahmed Ali",
                        "department" => "IT",
                        "salary" => 12000
                    ],
                    [
                        "name" => "Sara Mostafa",
                        "department" => "HR",
                        "salary" => 9000
                    ],
                    [
                        "name" => "Khaled Hussein",
                        "department" => "Marketing",
                        "salary" => 6000
                    ]
                ];

                $table_heads = array_keys($employees[0]);

                echo
                "<thead>
                    <tr> 
                    <th scope='col'>#</th>";
                foreach ($table_heads as $table_head)
                    echo  "<th scope='col'>$table_head</th>";

                echo "</tr>
                </thead>";


                foreach ($employees as $key => $employee) {
                    if ($employee['salary'] > 8000) {
                        $number = 1;
                        echo "<tbody>
                            <tr>
                              <th scope='row'>$number</th> ";

                        foreach ($employee as $employee_details)
                            echo "<td>$employee_details</td>";


                        echo "
                            </tr>
                          </tbody>";
                        $number++;
                    }
                }
                ?>



            </table>
        </div>
    </div>

</body>

</html>