<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    use HasFactory;

    // Chỉ định bảng sử dụng
    protected $table = 'tbl_admin';

    // Chỉ định khóa chính (nếu không phải 'id')
    protected $primaryKey = 'admin_id';

    // Tự động kiểm tra các trường thời gian (timestamps)
    public $timestamps = true;

    // Các trường có thể được gán
    protected $fillable = [
        'admin_email',
        'admin_password',
    ];
    protected $hidden = [
        'admin_name',
        'admin_phone',
    ];

    // Cấu hình cho việc xác thực
    public function getAuthIdentifierName()
    {
        return 'admin_id'; // Hoặc tên cột chính của bảng
    }

    public function getAuthIdentifier()
    {
        return $this->admin_id; // Hoặc khóa chính của bảng
    }

    public function getAuthPassword()
    {
        return $this->admin_password; // Cột chứa mật khẩu
    }

    public function getRememberToken()
    {
        return null; // Bạn có thể sử dụng nếu muốn hỗ trợ tính năng "Remember Me"
    }

    public function setRememberToken($value)
    {
        // Không cần thiết nếu không sử dụng "Remember Me"
    }

    public function getRememberTokenName()
    {
        return null; // Không cần thiết nếu không sử dụng "Remember Me"
    }
}