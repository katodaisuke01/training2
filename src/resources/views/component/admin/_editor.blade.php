
<div class="p-editor" id="post_detail"></div>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
  <script>
  const editor = new EditorJS({
    holder: "post_detail",
    minHeight:100,
    tools: {
      header: {
        class: Header,
        config: {
            levels: [1,2,3,4,5],
            defaultLevel: 3,
        },
      },
      image: {
        class: ImageTool,
          config: {
            uploader: {
              uploadByFile(file) {
                  let formData = new FormData()
                  formData.append('image', file)
                  let config = {headers: {'content-type': 'multipart/form-data'}}
                  return me.$axios.post('../image/image/upload', formData, config)
                  .then(res => {
                      return res.data
                    })
              },
              //only work when url has extensions like .jpg
              uploadByUrl(url) {
                return me.$axios.post('../image/image/upload', {url: url}).then(res => {
                  return res.data
                })
              }
            }
          }
      },
      list: List,
      checklist: Checklist,
      quote: Quote,
      table: Table,
      code: CodeTool
    }
  });
</script>