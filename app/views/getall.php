<?php 
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students CRUD</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background: #2c3e50;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:hover {
            background: #f1f7ff;
        }

        .actions a {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 6px;
            margin: 0 3px;
            font-size: 14px;
            transition: 0.2s;
        }

        .update {
            background: #3498db;
            color: white;
        }
        .update:hover {
            background: #2980b9;
        }

        .delete {
            background: #e74c3c;
            color: white;
        }
        .delete:hover {
            background: #c0392b;
        }

        .add-btn {
            display: block;
            width: fit-content;
            margin: 20px auto;
            text-decoration: none;
            background: #27ae60;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: 0.2s;
        }
        .add-btn:hover {
            background: #1e8449;
        }
    </style>
</head>
<body>
    <h2>Students List</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['last_name'] ?></td>
                <td><?= $student['first_name'] ?></td>
                <td><?= $student['email'] ?></td>
                <td class="actions">
                    <a href="<?= site_url('students/update/' . $student['id']); ?>" class="update">Update</a>
                    <a href="<?= site_url('students/delete/' . $student['id']); ?>" class="delete">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="<?= site_url('students/create'); ?>" class="add-btn">+ Add Student</a>
</body>
</html>
