<div class="row mt-3">
    @foreach($mobiles as $index => $mobile)
        <input type="hidden" name="mobile[{{ $index }}][mobile]" value="{{ $mobile->id }}">
        <input type="hidden" name="mobile[{{ $index }}][model]" value="{{ $mobile->phone }}">
        <input type="hidden" name="mobile[{{ $index }}][price]" placeholder="Price" required>

        <div class="col-md-4 mb-3">
            <div class="text-center">
                @if($mobile['picture_url_big'])
                @php
                $images = explode(";", $mobile['picture_url_big']);
                $firstImage = $images[0];
                @endphp
                @if(strpos($firstImage, 'https://fdn2.gsmarena.com') !== false)
                    <img  src = "{{$firstImage }}" alt = "shoe image" class="img-responsive" style="max-height: 115px;">
                @else  
                    <img src = "{{ asset($firstImage)}}" alt = "shoe image"class="img-responsive" style="max-height: 115px;">
                @endif
                @else
                <img class="img-responsive" style="max-height: 115px;"
                    src="https://media.istockphoto.com/id/1055079680/vector/black-linear-photo-camera-like-no-image-available.jpg?s=612x612&w=0&k=20&c=P1DebpeMIAtXj_ZbVsKVvg-duuL0v9DlrOZUvPG6UJk=">
                @endif
                <p class="text-dark mt-2"><strong>{{ $mobile->phone }}</strong></p>
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
                                        oninput="formatCurrency(this)">
                                </td>
                                <td>
                                <input type="text" class="form-control price_check"
                                    placeholder="Price" 
                                    name="mobile[{{ $index }}][memory_mrp][]" 
                                    id="memory_mrp_{{ $key }}" 
                                    value=""    
                                    oninput="formatCurrency(this)">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div id="memory_error" class="text-danger mb-2"></div>
                    <div id="memory_right" class="text-success mb-2"></div>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Add Offer</span>
                    </div>
                    <input type="text" class="form-control" name="phone_offer[]" id="phone_offer" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
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
        padding: .40rem;
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
