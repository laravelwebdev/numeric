import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-numeric', IndexField)
  app.component('detail-numeric', DetailField)
  app.component('form-numeric', FormField)
})
