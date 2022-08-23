const upload = document.getElementById("upload");
const image = document.querySelector(".preview");

const imageUpload = (event) => {
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();

        reader.addEventListener("load", (event) => {
            const avatar = document.querySelector(".avatar-null");

            avatar.style.display = "none";
            image.setAttribute("src", event.target.result);
            image.style.display = "block";
        });

        reader.readAsDataURL(file);
    }

    image.style.display = null;
    avatar.style.display = "block";
};

upload.addEventListener("change", imageUpload);
