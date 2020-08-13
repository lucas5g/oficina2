import useSWRV from 'swrv'

import api from '../services/api'

export function useFetch(url){
  const { data, error, mutate } = useSWRV(url, async url => {
    const response = await api.get(url)

    return response.data
  })

  return { data, error, mutate}
}