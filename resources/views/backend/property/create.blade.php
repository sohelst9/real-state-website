@extends('layout.backend.app')
@section('backend_content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add Property</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.property.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-12 mb-3">
                                    <label class="form-label" for="property_title"><span class="text-danger">*</span> Property Title</label>
                                    <input type="text" name="p_title" id="property_title" class="form-control">
                                    @error('p_title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label"><span class="text-danger">*</span> Selling Type</label>
                                    <select class="form-control" name="p_selling_type">
                                        <option value="">-select-</option>
                                        <option value="1">For Rent</option>
                                        <option value="2">For Sale</option>
                                    </select>
                                    @error('p_selling_type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label"><span class="text-danger">*</span> Property Type</label>
                                    <select class="form-control" name="p_type">
                                        <option value="">-select-</option>
                                        @foreach ($property_types as $property_type)
                                            <option value="{{ $property_type->id }}">{{ $property_type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('p_type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label">Is Feature</label>
                                    <select class="form-control" name="p_feature">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="property_price"><span class="text-danger">*</span> Price</label>
                                    <input type="text" name="p_price" id="property_price" class="form-control">
                                    @error('p_price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="property_area"><span class="text-danger">*</span> Area <span class="text-danger">(SqFt)</span></label>
                                    <input type="text" name="p_area" id="property_area" class="form-control">
                                    @error('p_area')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="floor">Floor</label>
                                    <input type="text" name="p_floor" id="floor" class="form-control">
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="property_address"><span class="text-danger">*</span> Address</label>
                                    <input type="text" name="p_address" id="property_address" class="form-control">
                                    @error('p_address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="p_city"><span class="text-danger">*</span> City</label>
                                    <select class="form-control" name="p_city">
                                        <option value="">-select-</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('p_city')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="p_state"><span class="text-danger">*</span> State</label>
                                    <input type="text" name="p_state" id="p_state" class="form-control">
                                    @error('p_state')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="p_map">Google Map</label>
                                    <input type="text" name="p_map" id="p_map" class="form-control">
                                    @error('p_map')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="p_bedroom">BedRoom</label>
                                    <select name="p_bedroom" id="p_bedroom" class="form-control">
                                        <option value="">-select-</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                    @error('p_bedroom')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="p_bathroom">BathRoom</label>
                                    
                                    <select name="p_bathroom" id="p_bathroom" class="form-control">
                                        <option value="">-select-</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                    @error('p_bathroom')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="p_thumbnail_image"><span class="text-danger">*</span> Thumbnail Image</label>
                                    <input type="file" name="p_thumbnail_image" id="p_thumbnail_image" class="form-control">
                                    @error('p_thumbnail_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="p_gallery_image">Gallery Image <span class="text-danger">(Multiple Images)</span></label>
                                    <input type="file" multiple name="p_gallery_image[]" id="p_gallery_image" class="form-control">
                                    @error('p_gallery_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="p_legal_document"><span class="text-danger">*</span> Legal Documents <span class="text-danger">(Multiple Only Pdf)</span></label>
                                    <input type="file" name="p_legal_document" id="p_legal_document" accept="application/pdf" class="form-control">
                                    @error('p_legal_document')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                
                                <h4>Add Social</h4>
                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="facebook">Facebook</label>
                                    <input type="text" name="facebook" id="facebook" class="form-control">
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="twitter">Twitter</label>
                                    <input type="text" name="twitter" id="twitter" class="form-control">
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="linkedin">Linkedin</label>
                                    <input type="text" name="linkedin" id="linkedin" class="form-control">
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="instagram">Instagram</label>
                                    <input type="text" name="instagram" id="instagram" class="form-control">
                                </div>

                                <div class="col-md-4 col-12 mb-3">
                                    <label class="form-label" for="youtube">youtube</label>
                                    <input type="text" name="youtube" id="youtube" class="form-control">
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label" for="p_description"><span class="text-danger">*</span> Description</label>
                                    <textarea name="p_description" id="myTextarea" class="form-control"></textarea>
                                    @error('p_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="nav d-flex justify-content-end col-12 mb-3 pl-15 pr-15">
                                    <button type="submit" class="btn btn-primary">Add Property</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('backend_script')
<script>
    tinymce.init({
        selector: '#myTextarea',
        plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        link_list: [{
                title: 'My page 1',
                value: 'https://www.codexworld.com'
            },
            {
                title: 'My page 2',
                value: 'http://www.codexqa.com'
            }
        ],
        image_list: [{
                title: 'My page 1',
                value: 'https://www.codexworld.com'
            },
            {
                title: 'My page 2',
                value: 'http://www.codexqa.com'
            }
        ],
        image_class_list: [{
                title: 'None',
                value: ''
            },
            {
                title: 'Some class',
                value: 'class-name'
            }
        ],
        importcss_append: true,
        file_picker_callback: (callback, value, meta) => {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
                callback('https://www.google.com/logos/google.jpg', {
                    text: 'My text'
                });
            }

            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
                callback('https://www.google.com/logos/google.jpg', {
                    alt: 'My alt text'
                });
            }

            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
                callback('movie.mp4', {
                    source2: 'alt.ogg',
                    poster: 'https://www.google.com/logos/google.jpg'
                });
            }
        },
        templates: [{
                title: 'New Table',
                description: 'creates a new table',
                content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
            },
            {
                title: 'Starting my story',
                description: 'A cure for writers block',
                content: 'Once upon a time...'
            },
            {
                title: 'New list with dates',
                description: 'New List with dates',
                content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
            }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 400,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image table',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });
</script>
@endsection