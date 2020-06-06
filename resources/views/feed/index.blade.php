@extends('template')
<style>
    .new-post {
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .new-post__user-photo {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        margin-right: 2rem;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.75);
    }

    .new-post__form {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .new-post__input {
        border-radius: 5px;
        border: none;
        box-shadow: 0 0 1px rgba(0, 0, 0, 0.75);
        background-color: #eeeeee;
        padding: 1rem;
        margin-bottom: 1rem;
        height: 5rem;
    }

    .new-post__input::placeholder {
        color: #333;
    }

    .new-post__additional {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .new-post__button {
        align-self: flex-end;
        border: none;
        background-color: #81C784;
        padding: .5rem 1rem;
        border-radius: 5px;
        box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.75);
        color: #fff;
        font-weight: 700;
        cursor: pointer;
        transition: box-shadow 250ms ease-in-out;
    }

    .new-post__button:hover {
        box-shadow: 1px 2px 2px rgba(0, 0, 0, 0.75);
    }
</style>
@section('conteudo')
    <div class="container">
        <section class="new-post">
            <img class="new-post__user-photo" src="https://i.pravatar.cc/64" alt="">
            <form class="new-post__form" action="{{route('feed.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="new-post__label">
                    <textarea class="new-post__input" placeholder="O que você tem ingerido?"
                              name="message"></textarea>
                </label>
                <div class="new-post__additional">
                    <label>
                        <input type="file" name="photos">
                    </label>
                    <button class="new-post__button">Postar!</button>
                </div>
            </form>
        </section>
    </div>
@endsection
