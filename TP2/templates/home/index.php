<h1>
    Hello <?php echo $name; ?>
</h1>

<form class="mb-6" action="." method="post">
    <div class="flex flex-col mb-4">
        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="first_name">Nom</label>
        <input class="border py-2 px-3 text-grey-darkest" type="text" name="name" id="first_name">
    </div>
    <button class="block bg-teal hover:bg-teal-dark text-white uppercase text-lg mx-auto p-4 rounded" type="submit">Oui</button>
</form>