<!DOCTYPE html>
<html>
<head>
    <title>Today's Tasks</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f4f8; color: #334155; line-height: 1.6; margin: 0; padding: 40px 20px; }
        .container { max-width: 800px; margin: 0 auto; background: #ffffff; padding: 30px 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); }
        nav { margin-bottom: 30px; border-bottom: 1px solid #e2e8f0; padding-bottom: 15px; }
        nav a { color: #64748b; text-decoration: none; margin-right: 20px; font-weight: 500; transition: color 0.2s ease; }
        nav a:hover { color: #3b82f6; }
        h1 { color: #1e293b; font-size: 1.8rem; margin-top: 0; }
        ul { list-style-type: none; padding: 0; }
        li { background: #f8fafc; margin-bottom: 10px; padding: 12px 15px; border-radius: 6px; border-left: 4px solid #94a3b8; }
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
        
        <h1>Welcome! Here are your tasks for today.</h1>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li><strong><?= esc($task['title']) ?></strong> - <?= esc($task['status']) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>