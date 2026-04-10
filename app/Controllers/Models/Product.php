<?php

namespace App\Models;

use App\Model;

class Product extends Model
{
    //khai baos teen bangr trong db 
    //neeus khoong khai baos thif basemodel sẽ đoán nó là 'customers'
    //trường hợp để tên bảng tiếng việt 'khach_hang' thì bắt buộc khai báo 
    protected $table = 'products';


    //tên khóa chính
    //mặc định sẽ là id, khai báo lại khi khóa chính không phải là id
    protected $primaryKey = 'id';


    //danh sách các cột được phép thêm dữ liệu vào bảng
    //chỉ những cột khai báo thì mới được thêm giá trị
    protected $fillable = [
        'id',
        'name',
        'img_thumbnail',
        'description',
        'created_at',
        'updated_at',
    ];

    //danh sách các cột không được thêm/ sửa dữ liệu
    protected $guarded = ['id'];

    //bật tắt quản lí thời gian(created_at, update_at)
    //nếu bảng có 2 cột thời gian thì "true" sẽ tự động cập nhật khi thêm/ sửa dữ liệu
    //nếu không muốn đẩy dữ liệu vào hoặc không có 2 cột thời gian thì để "false"
    protected $timestamps = false;
