<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = new Content();
        $profile->profile = "Kong Djie Coffee merupakan usaha kopi yang berdiri sejak 1943 yang berlokasi di Tanjung Pandan , Belitung. Saat ini Kong Djie di dukung lebih 100 outlet cafe dan resto. Kong Djie berkomitmen untuk selalu memenuhi kebutuhan dan kepuasan konsumen, tidak hanya dengan menyediakan produk dengan kualitas terbaik, namun juga memberikan solusi yang tepat bagi setiap pangsa pasar kami.... Dengan pengalaman yang cukup mumpuni Kong Djie telah memiliki kepekaan untuk memberikan Kualitas dan rasa atas setiap kebutuhan konsumen yang terus berkembang. Pengetahuan ini membuat kami mampu untuk memberikan solusi yang tepat bagi mitra kami dalam memenuhi keinginan konsumen yang semakin kompleks. Seluruh Produk kami terjamin keamanan dan mutunya karena sebelum beredar telah diperiksa dan didaftarkan ke Balai Pengawasan Obat dan Makanan (BPOM).";
        $profile->email = "kngdjcr43@gmail.com";
        $profile->telephone = "12345678";
        $profile->address = "Taman Palem Mutiara Blok B7 no.30 Cengkareng Timur, Jakarta Barat  ";
        $profile->whatsapp = "12345678";
        $profile->facebook = "https://www.facebook.com/";
        $profile->instagram = "https://www.instagram.com/";
        $profile->save();
    }
}
