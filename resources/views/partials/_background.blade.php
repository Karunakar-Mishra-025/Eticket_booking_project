<div class="container">
    <div id="slider">
        <figure>
            <img src="{{asset('images/img1.jpg')}}" height="700px" width="500px">
            <img src="{{asset('images/img2.jpg')}}" height="700px" width="500px">
            <img src="{{asset('images/img3.jpg')}}" height="700px" width="500px">
            <img src="{{asset('images/img4.jpg')}}" height="700px" width="500px">
            <img src="{{asset('images/img5.jpg')}}" height="700px" width="500px">
        </figure>
    </div>
    <form action="/search" method="post">
        @csrf
        <header>
            <h2>Search</h2>
        </header>
        <input type="text" name="from" id="from" placeholder="From" required>
        <input type="text" name="to" id="to" placeholder="To" required>
        <input type="date" name="date" id="date" min="2023-02-01" max="2023-02-28"required>
        <button type="submit">Search  <i class="fa-solid fa-search"></i></button>
    </form>
</div>