<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f4f8; color: #334155; margin: 0; padding: 40px 20px; }
        .container { max-width: 900px; margin: 0 auto; background: #ffffff; padding: 30px 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); }
        h1 { color: #1e293b; margin-top: 0; }
        a.button { display: inline-block; background-color: #3b82f6; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; margin-bottom: 20px; }
        a.button:hover { background-color: #2563eb; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #e2e8f0; vertical-align: middle; }
        th { background-color: #f8fafc; font-weight: 600; }
        .edit-link { color: #10b981; text-decoration: none; font-weight: bold; }
        .avatar-img { width: 50px; height: 50px; border-radius: 50%; object-fit: cover; border: 2px solid #cbd5e1; }
        .placeholder { width: 50px; height: 50px; border-radius: 50%; background-color: #e2e8f0; display: inline-block; text-align: center; line-height: 50px; color: #94a3b8; font-size: 12px; border: 2px solid #cbd5e1; }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Accounts</h1>
        <a href="<?= base_url('/users/new') ?>" class="button">+ Add New User</a>
        <table>
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php foreach ($users as $u): ?>
            <tr>
                <td>
                    <?php if ($u['avatar']): ?>
                        <img src="<?= base_url('uploads/' . esc($u['avatar'])) ?>" class="avatar-img" alt="Avatar">
                    <?php else: ?>
                        <div class="placeholder">No Img</div>
                    <?php endif; ?>
                </td>
                <td><?= esc($u['username']) ?></td>
                <td><?= esc($u['full_name']) ?></td>
                <td><?= esc($u['email']) ?></td>
                <td><a href="<?= base_url('/users/edit/'.$u['id']) ?>" class="edit-link">Edit</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
