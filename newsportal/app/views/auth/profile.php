<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card shadow-sm mb-4">
            <div class="card-body text-center">
                <div class="mb-3">
                    <i class="fas fa-user-circle fa-5x text-secondary"></i>
                </div>
                <h4><?= htmlspecialchars($user['name']) ?></h4>
                <p class="text-muted"><?= htmlspecialchars($user['email']) ?></p>
                <span class="badge badge-danger"><?= ucfirst($user['role']) ?></span>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Update Profile</h5>
            </div>
            <div class="card-body">
                <form action="/newsportal/profile/update" method="POST">
                    <div class="form-group mb-3">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
                    </div>
                    <div class="form-group mb-4">
                        <label>New Password (leave blank to keep current)</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-danger">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
