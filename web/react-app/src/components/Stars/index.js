import React from 'react'
import styled from 'styled-components'

const Container = styled.div`
  display: flex;
  flex-flow: row nowrap;
  > * {
    margin-left: .3rem;
    width: 1rem;
    height: 1rem;
  }
`

const Stars = ({ value, color }) => {
  let stars = []
  for (var i = 0; i < 5; i++) {
    stars.push(
      <svg viewBox="0 0 16 15" key={i} xmlns="http://www.w3.org/2000/svg">
        <path d="M8 12l-4.702 2.472.898-5.236L.392 5.528l5.257-.764L8 0l2.35 4.764 5.258.764-3.804 3.708.898 5.236" fill={`${ i < value ? color : '#D8D8D8'}`} fillRule="evenodd"/>
      </svg>
    )
  }
  return (
    <Container>{ stars }</Container>
  )
}

export default Stars
