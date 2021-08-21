const subStandard1 = `<select class="form-select form-select-lg" id="subStandards1" name="subStandards1" aria-label=".form-select-lg example required">
                        <option value="">Pilih Sub Standard:</option>
                        <option value="1.a">1.1.a   :Kejelasan dan Kerealistisan Visi, Misi, Tujuan, dan Sasaran Program Studi</option>
                        <option value="1.b">1.1.b   :Strategi pencapaian sasaran program Studi</option>
                        <option value="2">1.2       :Efektifitas sosialisasi Visi-Misi Program Studi</option>
                    </select>`;

const subStandard2 = `<select class="form-select form-select-lg" id="subStandards1" name="subStandards1" aria-label=".form-select-lg example required">
                        <option value="">Pilih Sub Standard:</option>
                        <option value="1">2.1       :Tata pamong yang kredibel, transparan. akuntabel, bertanggung jawab, dan adil</option>
                        <option value="2">2.2       :Karakteristik kepemimpinan: operasional, organisasi, publik</option>
                        <option value="3">2.3       :Sistem pengelolaan fungsional dan operasional program studi</option>
                        <option value="4">2.4       :Pelaksanaan penjaminan mutu program studi</option>
                        <option value="5">2.5       :Penjaringan umpan balik dan tindak lanjut</option>
                        <option value="6.a">2.6.a   :Upaya untuk meningkatkan animo calon mahasiswa</option>
                        <option value="6.b">2.6.b   Upaya peningkatan mutu manajemen</option>
                        <option value="6.c">2.6.c   Upaya peningkatan mutu lulusan</option>
                        <option value="6.d">2.6.d   Upaya untuk pelaksanaan dan hasil kerjasama kemitraan</option>
                        <option value="6.e">2.6.e   Upaya dan prestasi dalam memperoleh dana hibah kompetitif</option>
                    </select>`;

const subStandard3 = `<select class="form-select form-select-lg" id="subStandards1" name="subStandards1" aria-label=".form-select-lg example required">
                        <option value="">Pilih Sub Standard:</option>
                        <option value="1">3.1 Data Mahasiswa</option>
                        <option value="2.a">3.2.a Bimbingan dan Konseling</option>
                        <option value="2.b">3.2.b Minat dan Bakat</option>
                        <option value="2.c">3.2.c Pembinaan softskill</option>
                        <option value="2.d">3.2.d Layanan beasiswa</option>
                        <option value="2.e">3.2.e Layanan kesehatan</option>
                        <option value="3">3.3 Pelacakan dan perekaman data lulusan</option>
                        <option value="4">3.4 Partisipasi alumni dalam mendukung pengembangan akademik dan non-akademik program studi</option>
                    </select>`;

const subStandard4 = `<select class="form-select form-select-lg" id="subStandards1" name="subStandards1" aria-label=".form-select-lg example required">
                        <option value="">Pilih Sub Standard:</option>
                        <option value="1">4.1 Sistem seleksi dosen dan tenaga kependidikan</option>
                        <option value="2">4.2 Sistem monitoring dan evaluasi kinerja dosen</option>
                        <option value="3">4.3 Data dosen tetap</option>
                        <option value="4">4.4 Kompetensi dosen</option>
                        <option value="5">4.5 Data tenaga kependidikan</option>
                    </select>`;

const subStandard5 = `<select class="form-select form-select-lg" id="subStandards1" name="subStandards1" aria-label=".form-select-lg example required">
                        <option value="">Pilih Sub Standard:</option>
                        <option value="1">5.1 Perumusan, penyusunan dan penetapan kurikulum</option>
                        <option value="2">5.2 Peninjauan kurikulum</option>
                        <option value="3">5.3 Proses perkuliahan</option>
                        <option value="4">5.4 Pembimbingan akademik</option>
                        <option value="5">5.5 Tugas akhir mahasiswa</option>
                        <option value="6">5.6 Susunan akademik</option>
                    </select>`;

const subStandard6 = `<select class="form-select form-select-lg" id="subStandards1" name="subStandards1" aria-label=".form-select-lg example required">
                        <option value="">Pilih Sub Standard:</option>
                        <option value="1">6.1 Penyusunan dan pengelolaan dana</option>
                        <option value="2">6.2 Dana operasional</option>
                        <option value="3">6.3 Sarana dan prasarana program studi</option>
                        <option value="4">6.4 Bahan pustaka</option>
                    </select>`;

const subStandard7 = `<select class="form-select form-select-lg" id="subStandards1" name="subStandards1" aria-label=".form-select-lg example required">
                        <option value="">Pilih Sub Standard:</option>
                        <option value="1">7.1 Penelitian</option>
                        <option value="2">7.2 Pengabdian kepada masyarakat</option>
                        <option value="3">7.3 Kerjasama</option>
                    </select>`;

const subStandard8 = `<select class="form-select form-select-lg" id="subStandards1" name="subStandards1" aria-label=".form-select-lg example required">
                        <option value="">Pilih Sub Standard:</option>
                    </select>`;

const subStandard9 = `<select class="form-select form-select-lg" id="subStandards1" name="subStandards1" aria-label=".form-select-lg example required">
                        <option value="">Pilih Sub Standard:</option>
                    </select>`;

const pilihStandards = document.getElementById("standards")
const stdSelections = document.getElementsByClassName("stdsel")
const standardcol = document.getElementsByClassName("standard-col")

// const pickedStandard = pilihStandards.value
// if (pickedStandard === 1) {
//     const container = pilihStandards.parentElement.parentElement
//     parent = document.createElement('div')
//     parent.classList.add('col-md-6')
//     parent.innerHTML = subStandard1
//     container.append(parent);
// }

pilihStandards.addEventListener("click", insertSelection1);

function insertSelection1() {
    let pickedStandard = pilihStandards.value
    console.log("clicked", pickedStandard)
    if (pickedStandard === "1") {
        if(standardcol.length > 1){
            const pilihSubStandards1 = document.getElementById("subStandards1")
            pilihSubStandards1.parentElement.remove();
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard1
            container.append(parent)
        } 
        if(standardcol.length < 2){
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard1
            container.append(parent)
        }
    }
    if (pickedStandard === "2") {
        if(standardcol.length > 1){
            const pilihSubStandards1 = document.getElementById("subStandards1")
            pilihSubStandards1.parentElement.remove()
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard2
            container.append(parent)
        } 
        if(standardcol.length < 2){
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard2
            container.append(parent)
        }
    }
    if (pickedStandard === "3") {
        if(standardcol.length > 1){
            const pilihSubStandards1 = document.getElementById("subStandards1")
            pilihSubStandards1.parentElement.remove()
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard3
            container.append(parent)
        } 
        if(standardcol.length < 2){
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard3
            container.append(parent)
        }
    }
    if (pickedStandard === "4") {
        if(standardcol.length > 1){
            const pilihSubStandards1 = document.getElementById("subStandards1")
            pilihSubStandards1.parentElement.remove()
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard4
            container.append(parent)
        } 
        if(standardcol.length < 2){
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard4
            container.append(parent)
        }
    }
    if (pickedStandard === "5") {
        if(standardcol.length > 1){
            const pilihSubStandards1 = document.getElementById("subStandards1")
            pilihSubStandards1.parentElement.remove()
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard5
            container.append(parent)
        } 
        if(standardcol.length < 2){
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard5
            container.append(parent)
        }
    }
    if (pickedStandard === "6") {
        if(standardcol.length > 1){
            const pilihSubStandards1 = document.getElementById("subStandards1")
            pilihSubStandards1.parentElement.remove()
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard6
            container.append(parent)
        } 
        if(standardcol.length < 2){
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard6
            container.append(parent)
        }
    }
    if (pickedStandard === "7") {
        if(standardcol.length > 1){
            const pilihSubStandards1 = document.getElementById("subStandards1")
            pilihSubStandards1.parentElement.remove()
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard7
            container.append(parent)
        } 
        if(standardcol.length < 2){
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard7
            container.append(parent)
        }
    }
    if (pickedStandard === "8") {
        if(standardcol.length > 1){
            const pilihSubStandards1 = document.getElementById("subStandards1")
            pilihSubStandards1.parentElement.remove()
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard8
            container.append(parent)
        } 
        if(standardcol.length < 2){
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard8
            container.append(parent)
        }
    }
    if (pickedStandard === "9") {
        if(standardcol.length > 1){
            const pilihSubStandards1 = document.getElementById("subStandards1")
            pilihSubStandards1.parentElement.remove()
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard9
            container.append(parent)
        } 
        if(standardcol.length < 2){
            const container = document.getElementById("standard-row")
            parent = document.createElement('div')
            parent.classList.add('col-md-6','standard-col')
            parent.innerHTML = subStandard9
            container.append(parent)
        }
    }
};

const usersname = document.getElementById("usersname").innerText;
const uploader = document.getElementById("uploader");

uploader.value = usersname
