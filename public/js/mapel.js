var dropdownMapelTipe = "";
var dropdownMapel_kategori = "";

$(document).ready(function () {
    $(".dtMapel .dataTable-dropdown label").before("<button class='btn btn-primary' id='btnAddMapel'>Tambah Data </button>  ");
    
    // mengambil data mapel tipe
    $.ajax({
        url: "UniversalGetData/mapelTipe",
        type:"Get",
        success:function(response) {
            dtMapelType = response;
            console.log('dtMapelType', dtMapelType);

            var i;
            for (i = 0; i < dtMapelType.length; ++i) {
                dropdownMapelTipe += `<option value="${dtMapelType[i]["id"]}">${dtMapelType[i]["nama"]}</option>`;
            }
            dropdownMapelTipe = `<select class="form-control mapel_type">${dropdownMapelTipe} </select>`;
        },
        error:function(){
            alert("Gagal ambil data mapel tipe");
        }

    });
    
    // mapel_kategori
    $.ajax({
        url: "UniversalGetData/mapel_kategori",
        type:"Get",
        success:function(response) {
            dtMapel_kategori = response;
            console.log('dtMapel_kategori', dtMapel_kategori);

            var i;
            for (i = 0; i < dtMapel_kategori.length; ++i) {
                dropdownMapel_kategori += `<option value="${dtMapel_kategori[i]["id"]}">${dtMapel_kategori[i]["nama"]}</option>`;
            }
            dropdownMapel_kategori = `<select class="form-control mapel_kategori_id">${dropdownMapel_kategori} </select>`;
        },
        error:function(){
            alert("Gagal ambil data Mapel_kategori");
        }

    });
});

$(document).on("click", "#btnAddMapel", function () {
    var className =  makeid(10);
    
    $("tbody").prepend(`
        <tr class="tr_${className}">
            <td><input type='text' class="form-control nama" id=''></td>
            <td><input type='text' class="form-control deskripsi" id=''></td>
            <td>
                ${dropdownMapel_kategori}    
            </td>
            <td>
                ${dropdownMapelTipe}
            </td>
            <td>
                <select class="form-control nilai_minimal">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    <option>13</option>
                    <option>14</option>
                    <option>15</option>
                    <option>16</option>
                    <option>17</option>
                    <option>18</option>
                    <option>19</option>
                    <option>20</option>
                    <option>21</option>
                    <option>23</option>
                    <option>24</option>
                    <option>25</option>
                    <option>26</option>
                    <option>27</option>
                    <option>28</option>
                    <option>29</option>
                    <option>30</option>
                    <option>31</option>
                    <option>32</option>
                    <option>33</option>
                    <option>34</option>
                    <option>35</option>
                    <option>36</option>
                    <option>37</option>
                    <option>38</option>
                    <option>39</option>
                    <option>40</option>
                    <option>41</option>
                    <option>42</option>
                    <option>43</option>
                    <option>44</option>
                    <option>45</option>
                    <option>46</option>
                    <option>47</option>
                    <option>48</option>
                    <option>49</option>
                    <option>50</option>
                    <option>51</option>
                    <option>52</option>
                    <option>53</option>
                    <option>54</option>
                    <option>55</option>
                    <option>56</option>
                    <option>57</option>
                    <option>58</option>
                    <option>59</option>
                    <option>60</option>
                    <option>61</option>
                    <option>62</option>
                    <option>63</option>
                    <option>64</option>
                    <option>65</option>
                    <option>66</option>
                    <option>67</option>
                    <option>68</option>
                    <option>69</option>
                    <option>70</option>
                    <option>71</option>
                    <option>72</option>
                    <option>73</option>
                    <option>74</option>
                    <option>75</option>
                    <option>76</option>
                    <option>77</option>
                    <option>78</option>
                    <option>79</option>
                    <option>80</option>
                    <option>81</option>
                    <option>82</option>
                    <option>83</option>
                    <option>84</option>
                    <option>85</option>
                    <option>86</option>
                    <option>87</option>
                    <option>88</option>
                    <option>89</option>
                    <option>90</option>
                    <option>91</option>
                    <option>92</option>
                    <option>93</option>
                    <option>94</option>
                    <option>95</option>
                    <option>96</option>
                    <option>97</option>
                    <option>98</option>
                    <option>99</option>
                    <option>100</option>
                </select>
            </td>
            <td>
                <select class="form-control wajib_lulus">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </td>
            <td>
                <select class="form-control is_active">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </td>
            <td>
                <button class='btn btn-primary btnSave' id="btnSave_${className}">Simpan</button>
                <button class='btn btn-danger btnCancel' id="btnCancel_${className}">Batal</button>
            </td>
        </tr>
    `);
});

$(document).on("click", ".btnCancel", function () {
    var idRow = $(this).attr("id").replace("btnCancel_", "");
    $(`.tr_${idRow}`).remove();
});

function getData(tr){
    var dataPost = new Object();
    dataPost.id =  tr;
    dataPost.nama = $(`.tr_${tr} .nama`).val();
    dataPost.deskripsi =  $(`.tr_${tr} .deskripsi`).val();
    dataPost.mapel_kategori_id = $(`.tr_${tr} .mapel_kategori_id`).val();
    dataPost.namaKategory = $(`.tr_${tr} .mapel_kategori_id option:selected`).text();
    dataPost.mapel_type = $(`.tr_${tr} .mapel_type`).val();
    dataPost.namaType = $(`.tr_${tr} .mapel_type option:selected`).text();
    dataPost.nilai_minimal = $(`.tr_${tr} .nilai_minimal`).val();
    dataPost.wajib_lulus = $(`.tr_${tr} .wajib_lulus`).val();
    dataPost.is_active = $(`.tr_${tr} .is_active`).val();

    return dataPost;
}

$(document).on("click", ".btnSave", function () {
    var idRow = $(this).attr("id").replace("btnSave_", "");
    var dataPost = getData(idRow);
    console.log("dataPost", dataPost);
  
    $.ajax({
      url: "mapel/add ",
      type: "POST",
  
      data: dataPost,
      success: function (response) {
        console.log(response);
  
        var data = response;
        if (data.id != "0") {
          $("tbody").prepend(`
                  <tr class="tr_${data.id}">
                      <td class="nama">${dataPost.nama}</td>
                      <td class="deskripsi">${dataPost.deskripsi}</td>
                      <td hidden class="mapel_kategori_id">${dataPost.mapel_kategori_id}</td>
                      <td class="namaKategory">${dataPost.namaKategory}</td> 
                      <td hidden class="mapel_type">${dataPost.mapel_type}</td>
                      <td class="namaType">${dataPost.namaType}</td>
                      <td class="nilai_minimal">${dataPost.nilai_minimal}</td>
                      <td class="wajib_lulus">${dataPost.wajib_lulus}</td> 
                      <td class="is_active">${dataPost.is_active}</td> 
                      <td>
                          <button class='btn btn-info btn-xs btnEdit' id="tbnEdit_${data.id}">Edit</button> 
                          <button class='btn btn-danger btn-xs btnRemove' id="btnRemove_${data.id}">Hapus</button> 
                      </td>
                  </tr>
              `);
  
          $(".DataTable td").css({ "font-size": 20 });
          $(`.tr_${idRow}`).remove();
        }else{
            alert(data.pesan);
        }
      },
      error: function () {
        alert("Terjadi kesalahan");
      },
    });
  });
  
// edit data

$(document).on("click", ".btnEdit", function () {
    var idRow = $(this).attr("id").replace("btnEdit_", "");
    console.log('idRow', idRow)
    var dataPost = getData(idRow);
    console.log(dataPost);
    var nama = $(`.tr_${idRow} .nama`).html().trim();;
    var deskripsi = $(`.tr_${idRow} .deskripsi`).html().trim();
    var mapel_kategori_id = $(`.tr_${idRow} .mapel_kategori_id`).html().trim();;
    var mapel_type = $(`.tr_${idRow} .mapel_type`).html().trim();;
    var nilai_minimal = $(`.tr_${idRow} .nilai_minimal`).html().trim();;
    var wajib_lulus = $(`.tr_${idRow} .wajib_lulus`).html().trim();;
    var is_active = $(`.tr_${idRow} .is_active`).html().trim();;
  
    $(`.tr_${idRow}`).hide();
    $(`.tr_${idRow}`).addClass(`lama_${idRow}`);
  
    $(`.tr_${idRow}`).before(`
        <tr class="tr_${idRow} formEdit_${idRow}">
            <td><input type='text' class="form-control nama" id='' value='${nama}'></td>
            <td><input type='text' class="form-control deskripsi" id='' value='${deskripsi}'></td>
            <td>
                ${dropdownMapel_kategori}
            </td>
            <td>
                ${dropdownMapelTipe}
            </td>
            <td><input type='text' class="form-control nilai_minimal" id='' value='${nilai_minimal}'></td>
            <td><input type='text' class="form-control wajib_lulus" id='' value='${wajib_lulus}'></td>
            <td><input type='text' class="form-control is_active" id='' value='${is_active}'></td>
            <td>
                <button class='btn btn-primary btnSaveEdit' id="btnSave_${idRow}">Simpan</button>
                <button class='btn btn-danger btnCancelEdit' id="btnCancel_${idRow}">Batal</button>
            </td>
        </tr>
    `);

    $(`.tr_${idRow} .mapel_kategori_id`).val(mapel_kategori_id);
    $(`.tr_${idRow} .mapel_type`).val(mapel_type);
  });
  
// action update data
$(document).on("click", ".btnSaveEdit", function () {
    var yakin = confirm("Apakah anda yakin akan merubah data ini?");
    var idRow = $(this).attr("id").replace("btnSave_", "");
  
    if (yakin) {
        var dataPost = getData(idRow);
        console.log(dataPost);
  
        $.ajax({
            url: "mapel/update",
            type:"POST",
  
            data:dataPost,
            success:function(response) {
                var data = response;
                var dataTd = data.data;
                console.log('response', response);
                console.log('data id', response);
                $(`.formEdit_${idRow}`).before(`
                    <tr class="tr_${data.id}">
                        <td class="nama">${dataPost.nama}</td>
                        <td class="deskripsi">${dataPost.deskripsi}</td>
                        <td hidden class="mapel_kategori_id">${dataPost.mapel_kategori_id}</td>
                        <td class="namaKategory">${dataPost.namaKategory}</td> 
                        <td hidden class="mapel_type">${dataPost.mapel_type}</td>
                        <td class="namaType">${dataPost.namaType}</td>
                        <td class="nilai_minimal">${dataPost.nilai_minimal}</td>
                        <td class="wajib_lulus">${dataPost.wajib_lulus}</td>
                        <td class="is_active">${dataPost.is_active}</td>
                        <td>
                            <button class='btn btn-info btn-xs btnEdit' id="tbnEdit_${idRow}">Edit</button> 
                            <button class='btn btn-danger btn-xs' id="btnRemove_${idRow}">Hapus</button> 
                        </td>
                    </tr>
                `);
  
                $(".DataTable td").css({ 'font-size': 20 });
                $(`.formEdit_${idRow}`).remove();
                $(`.lama_${idRow}`).remove();
            },
            error:function(){
                alert("Terjadi kesalahan");
            }
  
        });
    } else {
        console.log('batal', idRow);
        $(`.tr_${idRow}`).show();
        $(`.formEdit_${idRow}`).remove();
        $(`.tr_${idRow}`).removeClass(`lama_${idRow}`);
    }
});