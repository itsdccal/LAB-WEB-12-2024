@extends('layouts.master')

@section('title', 'About')

@section('content')
    <!-- Hero Section -->
    <section style="background: url('{{ asset('images/bgs.jpg') }}') no-repeat center center; background-size: cover; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="container hero-section">
        <div class="row align-items-center">
            <!-- Image Section (Left) -->
            <div class="col-md-6 hero-image text-center">
                <img src="{{ asset('images/caso.jpg') }}" alt="Coffee Cup Image" class="img-fluid" style="max-width: 50%;">
            </div>

            <!-- Text Section (Right) -->
            <div class="col-md-6 hero-text mt-5" style="color: white; text-align: left;">
                <h1 style="font-size: 3rem; font-weight: bold;">
                    Soul (2020)
                </h1>
                <p style="color: grey; font-style: italic;">
                    Everybody has a soul. Joe Gardner is about to find his.
                </p>
                <p>
                    Joe Gardner is a middle school teacher with a love for jazz music. After a successful audition at the Half Note Club, he suddenly gets into an accident that separates his soul from his body and is transported to the You Seminar, a center in which souls develop and gain passions before being transported to a newborn child. Joe must enlist help from the other souls-in-training, like 22, a soul who has spent eons in the You Seminar, in order to get back to Earth.
                </p>
                <div style="display: flex; gap: 100px;">
                    <div>
                        <p><strong>Pete Docter</strong></p>
                        <p>Director, Screenplay, Story</p>
                    </div>
                    <div>
                        <p><strong>Kemp Powers</strong></p>
                        <p>Screenplay, Story</p>
                    </div>
                    <div>
                        <p><strong>Mike Jones</strong></p>
                        <p>Screenplay, Story</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


    <section style="background-color: rgb(253, 251, 255); width: 100%; display: flex; align-items: center; justify-content: center; padding: 20px;">
        <!-- Left side: Movie poster image -->
        <div style="flex: 1; max-width: 400px; text-align: center;">
            <img src="{{ asset('images/teso.png') }}" alt="Soul Movie Poster" style="width: 100%; height: auto; border-radius: 8px;">
        </div>
        
        <!-- Right side: YouTube video embed -->
        <div style="flex: 2; position: relative; max-width: 640px; padding-left: 20px;">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/xOsLIiBStEs?si=EcMfJZont2LtLJ2h" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        </div>
    </section>


    <section class="about" id="about" style="padding: 5px; background-color: rgb(6, 6, 87); overflow-x: auto;">
        <div class="container my-5">
            <h1 style="font-size: 2.5rem; color: #ffffff; font-family: sans-serif;">Meet the Characters of Disney and Pixar's <em>Soul</em></h1>
            
            <div class="d-flex py-5" style="gap: 15px; overflow-x: auto; padding-bottom: 1rem; scroll-behavior: smooth;">
                <div class="card hover-lift" style="min-width: 200px;">
                    <img src="{{ asset('images/joe.jpg') }}" class="card-img-top" alt="Coffe Latte">
                    <div class="card-body text-center">
                        <h5 class="coffee-title">Joe Gardner</h5>
                        <p class="text-muted">(voice of Jamie Foxx)</p>
                    </div>
                </div>
                
                <div class="card hover-lift" style="min-width: 200px;">
                    <img src="{{ asset('images/22.jpg') }}" class="card-img-top" alt="Macchiato">
                    <div class="card-body text-center">
                        <h5 class="coffee-title">22</h5>
                        <p class="text-muted">(Voice of Tina Fey)</p>
                    </div>
                </div>

                <div class="card hover-lift" style="min-width: 200px;">
                    <img src="{{ asset('images/libba.jpg') }}" class="card-img-top" alt="Macchiato">
                    <div class="card-body text-center">
                        <h5 class="coffee-title">Libba Gardner</h5>
                        <p class="text-muted">(voice of Phylicia Rashad)</p>
                    </div>
                </div>

                <div class="card hover-lift" style="min-width: 200px;">
                    <img src="{{ asset('images/dorothea.jpg') }}" class="card-img-top" alt="Macchiato">
                    <div class="card-body text-center">
                        <h5 class="coffee-title">Dorothea Williams</h5>
                        <p class="text-muted">(voice of Angela Bassett)</p>
                    </div>
                </div>

                <div class="card hover-lift" style="min-width: 200px;">
                    <img src="{{ asset('images/moonwind.jpg') }}" class="card-img-top" alt="Macchiato">
                    <div class="card-body text-center">
                        <h5 class="coffee-title">Moonwind</h5>
                        <p class="text-muted">(voice of Graham Norton)</p>
                    </div>
                </div>

                <div class="card hover-lift" style="min-width: 200px;">
                    <img src="{{ asset('images/The Counselors.jpg') }}" class="card-img-top" alt="Macchiato">
                    <div class="card-body text-center">
                        <h5 class="coffee-title">The Counselors</h5>
                        <p class="text-muted">(voices of Richard Ayoade)</p>
                    </div>
                </div>

                <div class="card hover-lift" style="min-width: 200px;">
                    <img src="{{ asset('images/Terry.jpg') }}" class="card-img-top" alt="Macchiato">
                    <div class="card-body text-center">
                        <h5 class="coffee-title">Terry</h5>
                        <p class="text-muted">(voice of Rachel House)</p>
                    </div>
                </div>

                <div class="card hover-lift" style="min-width: 200px;">
                    <img src="{{ asset('images/curley.jpg') }}" class="card-img-top" alt="Macchiato">
                        <div class="card-body text-center">
                            <h5 class="coffee-title">Curley</h5>
                            <p class="text-muted"> (voice of Ahmir Thompson)</p>
                    </div>
                </div>

                <div class="card hover-lift" style="min-width: 200px;">
                    <img src="{{ asset('images/paul.jpg') }}" class="card-img-top" alt="Macchiato">
                        <div class="card-body text-center">
                            <h5 class="coffee-title">Paul</h5>
                            <p class="text-muted">(Voice of Daveed Diggs)</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

<section class="about" id="about" style="padding: 40px; background-color: #C48E0E; overflow-x: auto;">
    <div class="container my-5 text-center">
        <h1 style="font-size: 2.5rem; color: #ffffff; font-family: 'Playball', cursive; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
            See the Photos of the Film <em>Soul</em>
        </h1>
        <br>
        <div id="carouselExampleAutoplaying" class="carousel slide shadow-lg rounded" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://img9.yna.co.kr/etc/inner/KR/2021/01/12/AKR20210112078300005_03_i_P4.jpg" class="d-block w-100 rounded" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://m.media-amazon.com/images/M/MV5BMTY0MTg4MWYtYzY2OS00ZDA3LTkwM2QtMzc0YTU5ZTliMTkyXkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_.jpg" class="d-block w-100 rounded" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://cdn-ak.f.st-hatena.com/images/fotolife/i/imakokowoikiru/20221013/20221013205405.png" class="d-block w-100 rounded" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev custom-control" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next custom-control" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

    <section class="about" id="about" style="background-color: rgb(255, 255, 255); overflow-x: auto; padding: 5rem 0;">
        <div class="container my-5">
            <h1 class="text-center" style="font-size: 2.5rem; color: rgb(6, 6, 87); font-family: sans-serif;">Top Cast <em>Soul</em></h1>

            <div class="d-flex justify-content-start py-5" style="gap: 50px; overflow-x: auto; white-space: nowrap; padding-bottom: 1rem; scroll-behavior: smooth;">
                <div class="text-center" style="display: inline-block; min-width: 150px;">
                    <img src="https://media.themoviedb.org/t/p/w138_and_h175_face/zD8Nsy4Xrghp7WunwpCj5JKBPeU.jpg" alt="Joe Gardner" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                    <h5 style="color: rgb(6, 6, 87);">Joe Gardner</h5>
                    <p class="text-muted" style="color: #000000;">(voice of Jamie Foxx)</p>
                </div>

                <div class="text-center" style="min-width: 150px;">
                    <img src="https://media.themoviedb.org/t/p/w138_and_h175_face/yPTAi1iucXf85UpiFPtyiTSM6do.jpg" alt="22" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                    <h5 style="color: rgb(6, 6, 87);">22</h5>
                    <p class="text-muted" style="color: #000000;">(voice of Tina Fey)</p>
                </div>

                <div class="text-center" style="min-width: 150px;">
                    <img src="https://media.themoviedb.org/t/p/w66_and_h66_face/orbTpG0jaYkPR167TNiEg0AKG3M.jpg" alt="Libba Gardner" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                    <h5 style="color: rgb(6, 6, 87);">Libba Gardner</h5>
                    <p class="text-muted" style="color: #000000;">(voice of Phylicia Rashad)</p>
                </div>

                <div class="text-center" style="min-width: 150px;">
                    <img src="https://media.themoviedb.org/t/p/w66_and_h66_face/oe6mXi0K68LWsGwGy6gwfnOu74z.jpg" alt="Dorothea Williams" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                    <h5 style="color: rgb(6, 6, 87);">Dorothea Williams</h5>
                    <p class="text-muted" style="color: #000000;">(voice of Angela Bassett)</p>
                </div>

                <div class="text-center" style="min-width: 150px;">
                    <img src="https://th.bing.com/th?id=OSK.1R_qee77fqENtoBlgkduzQHaGL&w=224&h=200&c=7&rs=1&o=6&dpr=1.1&pid=SANGAM" alt="Moonwind" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                    <h5 style="color: rgb(6, 6, 87);">Moonwind</h5>
                    <p class="text-muted" style="color: #000000;">(voice of Graham Norton)</p>
                </div>

                <div class="text-center" style="min-width: 150px;">
                    <img src="https://media.themoviedb.org/t/p/w66_and_h66_face/pdekQJx34S9mfUM356kXHPIzoCK.jpg" alt="The Counselors" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                    <h5 style="color: rgb(6, 6, 87);">The Counselors</h5>
                    <p class="text-muted" style="color: #000000;">(voice of Richard Ayoade)</p>
                </div>

                <div class="text-center" style="min-width: 150px;">
                    <img src="https://media.themoviedb.org/t/p/w300_and_h450_bestv2/m8D9XlTGfI0ZmauMKtYp5tw8eNi.jpg" alt="Terry" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                    <h5 style="color: rgb(6, 6, 87);">Terry</h5>
                    <p class="text-muted" style="color: #000000;">(voice of Rachel House)</p>
                </div>

                <div class="text-center" style="min-width: 150px;">
                    <img src="https://media.themoviedb.org/t/p/w66_and_h66_face/fAO3uL2UbtqLzjTQRvamyEfiLgA.jpg" alt="Curley" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                    <h5 style="color: rgb(6, 6, 87);">Curley</h5>
                    <p class="text-muted" style="color: #000000;">(voice of Ahmir Thompson)</p>
                </div>

                <div class="text-center" style="min-width: 150px;">
                    <img src="https://media.themoviedb.org/t/p/w66_and_h66_face/v4VmQP0iFFW7SU2ouE2Qhu27Hgy.jpg" alt="Paul" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                    <h5 style="color: rgb(6, 6, 87);">Paul</h5>
                    <p class="text-muted" style="color: #000000;">(voice of Daveed Diggs)</p>
                </div>
            </div>
        </div>
    </section>
@endsection
