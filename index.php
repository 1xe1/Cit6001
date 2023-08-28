<?php
                    // ทำการเชื่อมต่อฐานข้อมูล MySQL
                    $connection = mysqli_connect("localhost", "root", "", "invoicemgsys");

                    // ตรวจสอบการเชื่อมต่อ
                    if (!$connection) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // ดึงข้อมูล users จากฐานข้อมูล
                    $query = "SELECT id, name, username, email, phone, password FROM users";
                    $result = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['username']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['phone']}</td>";
                        
                        echo "<td>";
                        echo "<a href='edit_user.php?username={$row['username']}'>Edit</a>";
                        echo " | ";
                        echo "<a href='javascript:void(0);' onclick='confirmDelete(\"{$row['username']}\");'>Delete</a>";
                        echo "</td>";

                    
                        echo "</tr>";
                    }

                    // ปิดการเชื่อมต่อฐานข้อมูล
                    mysqli_close($connection);
                    ?>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>