#!/bin/bash

echo "شروع فرآیند گیت..."

# بررسی وضعیت پروژه
git status

# اضافه کردن تغییرات
echo "اضافه کردن تغییرات..."
git add .

# وارد کردن پیام کامیت
echo "لطفاً پیام کامیت خود را وارد کنید:"
read commit_message

# ایجاد کامیت
git commit -m "$commit_message"

# ارسال به مخزن اصلی
echo "ارسال تغییرات به مخزن اصلی..."
git push origin main

echo "تمام شد!"
