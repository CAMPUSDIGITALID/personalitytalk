<script>
    const pageData = @json($files); // $files is array of objects
    function renderPageContent(pageKey) {
        const data = pageData.find(item => item.path_file === pageKey) || {};
        let description = (data.active == 1 ? (data.meta_description ?? '') + '| {{ setting('site.description') }}' :
            data.meta_description) ?? 'Meta Description';
        let title = (data.active == 1 ? (data.meta_title ?? '') +
                ' | {{ setting('site.name') }} &#8211; {{ setting('site.tagline') }}' : data.meta_title) ??
            'Meta Title';

        document.getElementById('pageContent').innerHTML = `
        <input type="hidden" name="page" value="${pageKey}">
        <h5 class="mb-3">Page SEO ${pageKey}</h5>
        <hr>
        
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white p-3 mb-4">
                    <div class="card-header d-flex p-0 bg-transparent">
                        <div class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="36" viewBox="0 0 40 36" fill="none">
                                <ellipse cx="20" cy="18" rx="20" ry="18" fill="#D9D9D9"/>
                            </svg>
                        </div>
                        <div>
                            <p class="fw-bold m-0">PsikologAnda</p>
                            <p class="text-muted m-0">https://psikologanda.com</p>
                        </div> 
                    </div>
                    <div class="card-body p-0 mt-2">                        
                        <div class="text-primary fw-semibold mtitle-cl" id="preview-title">
                        ${title}
                        </div>
                        <div class="text-muted meta-description-class" id="preview-description">
                            ${description}
                        </div>
                    </div>
                </div>          
            </div>       
        </div>
        <input type="hidden" name="seo_id" value="${data.id || ''}"></input>
        <div class="mb-3">
            <label class="form-label">Meta Title</label>
            <input class="form-control" name="meta_title" placeholder="Meta Title" value="${data.meta_title ?? ''}">
        </div>

        <div class="mb-3">
            <label class="form-label">Meta Keyword</label>
            <input class="form-control" name="meta_keyword" placeholder="Meta Keyword berikan pemisah menggunakan koma (,)" value="${data.meta_keyword || ''}">
        </div>

        <div class="mb-3">
            <label class="form-label">Meta Description</label>
            <textarea class="form-control" name="meta_description" rows="3" placeholder="Meta Description">${data.meta_description ?? ''}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Tambahkan Default Meta dari setting ?</label> <br>
            <input type="hidden" value="0" name="active"></input>
            <input type="checkbox" value="1" name="active" ${data.active ? 'checked' : ''}> Yes </input>
        </div>
    `;

        addLivePreviewListeners();
    }

    function addLivePreviewListeners() {
        const titleInput = document.querySelector('input[name="meta_title"]');
        const descInput = document.querySelector('textarea[name="meta_description"]');

        const previewTitle = document.getElementById('preview-title');
        const previewDesc = document.getElementById('preview-description');

        if (titleInput && previewTitle) {
            titleInput.addEventListener('input', function() {
                previewTitle.textContent = this.value || 'Meta Title Preview';
            });
        }

        if (descInput && previewDesc) {
            descInput.addEventListener('input', function() {
                previewDesc.textContent = this.value || 'Meta Description Preview...';
            });
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        renderPageContent('blog');
    });
</script>
