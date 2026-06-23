interface PageMetaData {
  title?: string
  description?: string
  keywords?: string
  robots?: string
  canonical?: string
  image?: string
}

interface Page {
  id?: number
  title: string
  content: null | string
  author: null
  publishedAt: null | string
  url: string
  metaData: PageMetaData
}
