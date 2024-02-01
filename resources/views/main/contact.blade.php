<x-layout>
    <div class="contact-container">
        <form action="/contact" method="POST">
            @csrf
            <h2>Contact Form</h2>
            <input type="text" name="name" placeholder="Enter Your Name" required/>
            <input type="email" name="email" placeholder="Enter Your Email" required/>
            <textarea name="message" cols="30" rows="10" placeholder="Enter Your Message Here" required></textarea>
            <input type="submit">
        </form>
    </div>
    <div class="contact-container-main">
        <div class="text">
            <h2> <i class="fa-solid fa-envelope"></i> Email :- karunakarmishra2006@gmail.com</h2>
            <h2> <i class="fa-solid fa-phone"></i> Mobile :- +91 7756808982</h2>
        </div>
    </div>
</x-layout>