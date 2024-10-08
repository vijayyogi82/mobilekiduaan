<div class="row mt-3">
    @foreach($mobiles as $index => $mobile)
        <input type="hidden" name="mobile[{{ $index }}][mobile]" value="{{ $mobile->id }}">
        <input type="hidden" name="mobile[{{ $index }}][model]" value="{{ $mobile->phone }}">
        <input type="hidden" name="mobile[{{ $index }}][price]" placeholder="Price" required>

        <div class="col-md-4 mb-3">
            <div class="text-center">
                <div class="mb-3 position-relative">
                    <div class="custom-file-upload">
                        <input class="form-control-file" name="image" type="file" id="profile" onchange="displaySelectedImages(this, 'imagePreviewContainer')" multiple required>
                        <label for="profile" class="file-label" id="fileLabel">
                            <i class="fas fa-cloud-upload-alt"></i> Choose file
                        </label>
                    </div>
                </div>
                <!-- Image Preview Container -->
                <div id="imagePreviewContainer"></div>
            </div>
        </div>
        @if (!empty($mobile->memory_internal))
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table">
                            <tr>
                                <th>RAM</th>
                                <th>Price</th>
                                <th>MRP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(explode(",", $mobile->memory_internal) as $key => $data)
                            <tr>
                                <td class="align-middle">{{ $data }}</td>
                                <td>
                                    <input type="text" class="form-control price_check" 
                                        placeholder="Price" data-id="{{ $key + 1 }}"
                                        name="mobile[{{ $index }}][memory_price][]" 
                                        id="memory_price_{{ $key }}" value="" 
                                        oninput="formatCurrency(this)" required>
                                </td>
                                <td>
                                <input type="text" class="form-control price_check"
                                    placeholder="Price" 
                                    name="mobile[{{ $index }}][memory_mrp][]" 
                                    id="memory_mrp_{{ $key }}" 
                                    value=""
                                    oninput="formatCurrency(this)" required>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div id="memory_error" class="text-danger mb-2"></div>
                    <div id="memory_right" class="text-success mb-2"></div>
                </div>
            </div>
        @else
            <div class="col-md-8">
                <div class="alert alert-warning">
                    No memory data available for {{ $mobile->phone }}.
                </div>
            </div>
        @endif
    @endforeach
</div>


<style>
    .custom-file-upload {
        position: relative;
        display: inline-block;
        width: 100%;
    }
    .custom-file-upload input[type="file"] {
        display: none;
    }
    .custom-file-upload .file-label {
        display: block;
        padding: 9px 20px;
        border: 2px dashed #abb6c3;
        border-radius: 5px;
        background-color: #f8f9fa;
        color: #abb6c3;
        text-align: center;
        cursor: pointer;
        font-size: 1.2rem;
        transition: background-color 0.3s, border-color 0.3s;
        height: 50px;
    }
    .custom-file-upload .file-label:hover {
        background-color: #e9ecef;
        border-color: #0056b3;
    }
    .custom-file-upload .file-label i {
        margin-right: 10px;
    }
    .image-container {
        display: inline-block;
        position: relative;
        margin: 5px; 
        width: 50px;
        height: 50px;
    }
    .image-container img {
        width: 50px;   
        height: 50px; 
        object-fit: cover;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .remove-button {
        position: absolute;
        top: -5px;
        right: -5px;
        background: red;
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        font-size: 14px;
        width: 20px;
        height: 20px;
        text-align: center;
        line-height: 20px;
    }
</style>

<style>
    /* Mobile card styling */
    .mobile-card {
        background-color: #f8f9fa;
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
    }

    /* Table styling */
    .table {
        border: 1px solid #dee2e6;
    }

    .table thead {
        background-color: #18a2b4;
        color: #fff;
        border-radius: 5px;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    /* Inputs styling */
    .form-control {
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        transition: all 0.3s ease-in-out;
        font-size: 0.8rem;
    }

    .form-control:focus {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        border-color: #80bdff;
    }

    /* Alert box styling */
    .alert {
        border-radius: 0.375rem;
        font-size: 0.9rem;
    }

    .align-middle {
        font-size: 0.8rem !important;
    }
</style>



<script>
    function formatCurrency(input) {
        let value = input.value.replace(/[^0-9.]/g, '');
        let parts = value.split('.');
        let whole = parts[0];
        let decimal = parts.length > 1 ? '.' + parts[1].substr(0, 2) : '';
        whole = whole.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        input.value = whole + decimal;
    }
</script>

<script>
    function displaySelectedImages(input, containerId) {
        var container = document.getElementById(containerId);
        var files = input.files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();
            reader.onload = function(e) {
                var image = new Image();
                image.src = e.target.result;

                var imageContainer = document.createElement("div");
                imageContainer.classList.add("image-container");

                var imgElement = document.createElement("img");
                imgElement.src = image.src;
                imgElement.classList.add("img-responsive");

                var removeButton = document.createElement("button");
                removeButton.innerHTML = "x";
                removeButton.classList.add("remove-button");
                removeButton.addEventListener("click", function() {
                    container.removeChild(imageContainer);
                });

                imageContainer.appendChild(imgElement);
                imageContainer.appendChild(removeButton);
                container.appendChild(imageContainer);
            };
            reader.readAsDataURL(file);
        }
    }

    function deleteBanner(button) {
        button.closest('.image-container').remove();
    }
</script>

<script>
    $(document).ready(function() {
        function checkIfAllNA() {
            var allNA = true;
            $('.price_check').each(function() {
                if ($(this).val() !== 'N.A.') {
                    allNA = false; 
                }
            });
            $('.mrp_check').each(function() {
                if ($(this).val() !== 'N.A.') {
                    allNA = false; 
                }
            });
            if (allNA) {
                $('#memory_error').text('At least one price and MRP value is required.');
                $('#memory_right').text('');
                $('.price_check').first().val('');
                $('.mrp_check').first().val('');
            } else {
                $('#memory_error').text('');
                $('#memory_right').text('Valid input.');
            }
        }
        $(document).on('change', '.price_check', function() {
            var value = $(this).val().trim();
            var normalizedValue = value.replace(/,/g, '');
            if (/^0+$/g.test(normalizedValue)) {
                $(this).val('N.A.');
                var memory_mrp = $("#memory_mrp_" + $(this).data('id')).val('N.A.');
            }
            checkIfAllNA();
        });
        $(document).on('change', '.mrp_check', function() {
            var value = $(this).val().trim();
            var normalizedValue = value.replace(/,/g, '');
            if (/^0+$/g.test(normalizedValue)) {
                $(this).val('N.A.');
                var memory_price = $("#memory_price_" + $(this).data('id')).val('N.A.');
            }
            checkIfAllNA();
        });
    });
</script>
