<!DOCTYPE html>
<html>
<head>
    <title>All Tasks</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f4f8; color: #334155; line-height: 1.6; margin: 0; padding: 40px 20px; }
        .container { max-width: 800px; margin: 0 auto; background: #ffffff; padding: 30px 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); }
        nav { margin-bottom: 30px; border-bottom: 1px solid #e2e8f0; padding-bottom: 15px; }
        nav a { color: #64748b; text-decoration: none; margin-right: 20px; font-weight: 500; transition: color 0.2s ease; }
        nav a:hover { color: #3b82f6; }
        h1 { color: #1e293b; font-size: 1.8rem; margin-top: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #e2e8f0; }
        th { background-color: #f8fafc; color: #475569; font-weight: 600; }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <a href="<?= base_url('/') ?>">Home</a>
            <a href="<?= base_url('/tasks') ?>">All Tasks</a>
            <a href="<?= base_url('/profile') ?>">Profile</a>
            <a href="<?= base_url('/about') ?>">About</a>
        </nav>
        
        <h1>All Tasks</h1>
        <table>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['title']) ?></td>
                    <td><?= esc($task['status']) ?></td>
                    <td><?= esc($task['task_date']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>