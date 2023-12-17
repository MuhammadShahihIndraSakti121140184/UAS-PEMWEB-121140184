const form = document.getElementById('form');
const nama_lagu = document.getElementById('nama_lagu');
const penyanyi = document.getElementById('penyanyi');
const jumlah_terjual = document.getElementById('jumlah_terjual');
const tanggal_rilis = document.getElementById('tanggal_rilis');
const genre = document.getElementById('genre');

form.addEventListener('submit', e => {
    e.preventDefault();
    if (checkFormValidity()) {
        form.submit();
    }
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const checkFormValidity = () => {
    let isValid = true;

    const nama_laguValue = nama_lagu.value.trim();
    const penyanyiValue = penyanyi.value.trim();
    const jumlah_terjualValue = jumlah_terjual.value.trim();
    const tanggal_rilisValue = tanggal_rilis.value.trim();
    const genreValue = genre.value.trim();

    if (nama_laguValue === '') {
        setError(nama_lagu, 'Nama Lagu is required');
        isValid = false;
    } else {
        setSuccess(nama_lagu);
    }

    if (penyanyiValue === '') {
        setError(penyanyi, 'Penyanyi is required');
        isValid = false;
    } else {
        setSuccess(penyanyi);
    }

    if (jumlah_terjualValue === '') {
        setError(jumlah_terjual, 'Jumlah Terjual is required');
        isValid = false;
    } else {
        setSuccess(jumlah_terjual);
    }

    if (tanggal_rilisValue === '') {
        setError(tanggal_rilis, 'Tanggal Rilis is required');
        isValid = false;
    } else {
        setSuccess(tanggal_rilis);
    }

    if (genreValue === '') {
        setError(genre, 'Genre is required');
        isValid = false;
    } else {
        setSuccess(genre);
    }

    return isValid;
};
