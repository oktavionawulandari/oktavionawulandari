<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Portofolio | Okta</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/homestyle.css">

</head>
<body>

<!-- HEADER  -->

<header>

    <a href="/" class="logo"><span>Web</span>Portofolio</a>

    <input type="checkbox" id="menu-bar">
    <label for="menu-bar" class="fas fa-bars"></label>

    <nav class="navbar">
        <a href="#aboutme">About Me</a>
        <a href="#education">Education</a>
        <a href="#hobby">hobby</a>
        <a href="#skill">skill</a>
        <a href="#contact">contact</a>
        <a href="/user">Login</a>
    </nav>

</header>

<!-- HEADER  -->

<!-- ABOUT ME  -->

 <section class="aboutme" id="aboutme">
        <div class="content">
            <h3>Welcome To My Website <span>Portofolio</span></h3>
                <p> Saya Ni Luh Sri Oktaviona Wulandari, merupakan mahasiswa Politeknik Negeri Bali dengan jurusan Teknik Elektro, program studi D3 Manajemen Informatika. Saya memiliki pengalaman dalam mengerjakan web development dan desain grafis. Saya memiliki pengalaman berorganisasi sebagai koordinator publikasi dan dokumentasi di Unit kegiatan Sepak Bola dengan Event Football Training Center. </p>
        </div>

        <div class="image">
            <div class="col-4 offset-lg-2 col-md-5 offset-md1">
                <img src="image/fotoku.jpg" alt="fotoku"> 
            </div>
        </div>
    </section>

<!-- ABOUT ME  -->

<!-- EDUCATION  -->
<section class="education" id="education">
      <td>
      <div class="container" data-aos="fade-down" data-aos-duration="2000">
         <div class="row text-center mb-5">
            <div class="col">
                <h1 class="heading">education </h1>
            </div>
         </div>
            <thead>
         <div class="row justify-content-center">
         @forelse ($educations as $education)
            <div class="col-md-3 mb-3">
               <div class="card shadow p-3 mb-5 bg-body rounded ">@if ($education->image)
                  <img src="{{ asset('/' .$education->image) }}" alt="{{ $education->image }}"class="img-fluid mt-3">
              @endif
                  <div class="card-body">
                     <h3 class="text-center">{{ $education->judul }}</h3>
                    <h5 class="card-text">{{ $education->deskripsi }}</h5>
                  </div>
                </div>
            </div>
         @empty
         <div class="alert alert-danger">
            Data education belum Tersedia.
        </div>
         @endforelse          
      </div>
   </td>
   </section>
<!-- EDUCATION -->

<!-- SUBSCRIBE  -->
<div class="newsletter">

    <h3>Subscribe For New Features</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus sed aliquam quibusdam neque magni magnam est laborum doloribus, facere dolores.</p>
    <form action="">
        <input type="email" placeholder="enter your email">
        <input type="submit" value="Subscribe">
    </form>

</div>

<!-- SUBSCRIBE  -->

<!-- HOBBY  -->
<section class="hobby" id="hobby">
      <td>
      <div class="container" data-aos="fade-down" data-aos-duration="2000">
         <div class="row text-center mb-5">
            <div class="col">
                <h1 class="heading">hobby </h1>
            </div>
         </div>
            <thead>
         <div class="row justify-content-center">
         @forelse ($hobbies as $hobby)
            <div class="col-md-3 mb-3">
               <div class="card shadow p-3 mb-5 bg-body rounded ">@if ($hobby->image)
                  <img src="{{ asset('/' .$hobby->image) }}" alt="{{ $hobby->image }}"class="img-fluid mt-3">
              @endif
                  <div class="card-body">
                     <h3 class="text-center">{{ $hobby->judul }}</h3>
                    <h5 class="card-text">{{ $hobby->deskripsi }}</h5>
                  </div>
                </div>
            </div>
         @empty
         <div class="alert alert-danger">
            Data hobby belum Tersedia.
        </div>
         @endforelse          
      </div>
   </td>
   </section>
<!-- HOBBY -->

<!-- SKILL -->
<section class="skill" id="skill">
      <td>
      <div class="container" data-aos="fade-down" data-aos-duration="2000">
         <div class="row text-center mb-5">
            <div class="col">
                <h1 class="heading">skill </h1>
            </div>
         </div>
            <thead>
         <div class="row justify-content-center">
         @forelse ($skils as $skill)
            <div class="col-md-3 mb-3">
               <div class="card shadow p-3 mb-5 bg-body rounded ">@if ($skill->image)
                  <img src="{{ asset('/' .$skill->image) }}" alt="{{ $skill->image }}"class="img-fluid mt-3">
              @endif
                  <div class="card-body">
                     <h3 class="text-center">{{ $skill->judul }}</h3>
                    <h5 class="card-text">{{ $skill->deskripsi }}</h5>
                  </div>
                </div>
            </div>
         @empty
         <div class="alert alert-danger">
            Data skill belum Tersedia.
        </div>
         @endforelse          
      </div>
   </td>
   </section>
<!-- SKILL -->


<!-- CONTACT  -->
<section class="contact" id="contact">

    <div class="image">
        <img src="image/contact-img.png" alt="">
    </div>

     <form action="{{ route('contact.store') }}" method="POST">
            @csrf

        <h1 class="heading">contact us</h1>

        <div class="inputBox">
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            <label>name</label>
        </div>

        <div class="inputBox">
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            <label>email</label>
        </div>

        <div class="inputBox">
            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required>
            <label>subject</label>
        </div>

        <div class="inputBox"> 
            <textarea required name="message" id="message"  cols="30" rows="10" value="{{ old('message') }}"></textarea>
            <label>message</label>
        </div>

        <button type="submit" class="btn" value="send message">send</button>

    </form>

</section>
<!-- CONTACT -->

<!-- FOOTER  -->
<div class="footer">

    <div class="box-container">

        <div class="box">
            <h3>about us</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet pariatur rerum consectetur architecto ad tempora blanditiis quo aliquid inventore a.</p>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#aboutme">About Me</a>
            <a href="#education">Education</a>
            <a href="#hobby">hobby</a>
            <a href="#skill">skill</a>
            <a href="#contact">contact</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="https://www.facebook.com/sri.oktaviona.5">facebook</a>
            <a href="https://instagram.com/oktavionawulandari?igshid=YzA2ZDJiZGQ=">instagram</a>
            <a href="https://www.tiktok.com/@babybabyona?_t=8VnieyKRy8v&_r=1">tiktok</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <div class="info">
                <i class="fas fa-phone"></i>
                <p> +628983186927 <br> +6281337896989 </p>
            </div>
            <div class="info">
                <i class="fas fa-envelope"></i>
                <p> oktavionawulandari@gmail.com <br> srioktaviona10@gmail.com </p>
            </div>
            <div class="info">
                <i class="fas fa-map-marker-alt"></i>
                <p> Bali, Indonesia </p>
            </div>
        </div>

    </div>

    <h1 class="credit"> &copy; copyright by Okta </h1>

</div>

<!--FOOTER -->

    
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>