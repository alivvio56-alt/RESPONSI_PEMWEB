# Daftar Nama File JPG untuk Gambar Accordion Arc

Letakkan atau ganti gambar pada folder:

`img/arcs/`

Catatan: file JPG placeholder sudah disiapkan. Jika ingin memakai gambar asli/screenshot sendiri, cukup ganti isi file dengan nama yang sama persis seperti daftar di bawah.

## Naruto

| Arc | Episode | Nama file JPG |
|---|---:|---|
| Prolog Naruto Uzumaki | EP001–005 | `naruto-prolog-naruto-uzumaki.jpg` |
| Land of Waves | EP006–019 | `naruto-land-of-waves.jpg` |
| Chunin Exams | EP020–067 | `naruto-chunin-exams.jpg` |
| Konoha Crush | EP068–080 | `naruto-konoha-crush.jpg` |
| Search for Tsunade | EP081–100 | `naruto-search-for-tsunade.jpg` |
| Sasuke Recovery Mission | EP107–135 | `naruto-sasuke-recovery-mission.jpg` |

## Naruto Shippuden

| Arc | Episode | Nama file JPG |
|---|---:|---|
| Kazekage Rescue | EP001–032 | `shippuden-kazekage-rescue.jpg` |
| Long-Awaited Reunion | EP033–053 | `shippuden-long-awaited-reunion.jpg` |
| Hidan and Kakuzu | EP072–088 | `shippuden-hidan-and-kakuzu.jpg` |
| Itachi Pursuit Mission | EP113–143 | `shippuden-itachi-pursuit-mission.jpg` |
| Pain’s Assault | EP152–175 | `shippuden-pains-assault.jpg` |
| Fourth Shinobi World War | EP256–479 | `shippuden-fourth-shinobi-world-war.jpg` |

## Boruto

| Arc | Episode | Nama file JPG |
|---|---:|---|
| Academy Entrance | EP001–015 | `boruto-academy-entrance.jpg` |
| Sarada Uchiha | EP019–024 | `boruto-sarada-uchiha.jpg` |
| Chunin Exams / Momoshiki | EP051–066 | `boruto-chunin-exams-momoshiki.jpg` |
| One-Tail Escort | EP120–136 | `boruto-one-tail-escort.jpg` |
| Kara Actuation | EP157–180 | `boruto-kara-actuation.jpg` |
| Kawaki / Kara | EP181–220 | `boruto-kawaki-kara.jpg` |

## File yang diubah

- `naruto/index.php`
- `shippuden/index.php`
- `boruto/index.php`
- `js/anime.js`
- `css/anime.css`

## Pola kode yang dipakai

Setiap arc sekarang memiliki key `img`, misalnya:

```php
'img'=>'../img/arcs/naruto-land-of-waves.jpg'
```

Bagian accordion sekarang menampilkan:

```php
<img class="arc-thumb" src="<?= htmlspecialchars($arc['img']) ?>" alt="<?= htmlspecialchars($arc['title']) ?>" loading="lazy">
```
