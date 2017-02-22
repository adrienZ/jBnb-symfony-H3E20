import React, { Component } from 'react'
import { connect } from 'react-redux'
import styled from 'styled-components'

import Nav from '../../../../components/Nav'
import Result from '../../../../components/Result'
import background from '../../../../assets/background.jpg'
import * as colorActions from '../../../../actions/colorActions'
import data from './data.json'

const Container = styled.section`
  background-image: url(${props => props.background});
  background-repeat: repeat;
  min-height: 100vh;
`

const ResultsContainer = styled.div`
  display: flex;
  flex-flow: column;
`

class ResultScene extends Component {
  constructor(props) {
    super(props)
    this.state = {

    }
  }
  render() {
    const { color } = this.props.color
    return (
      <Container background={background}>
        <Nav />
        Hello
        <ResultsContainer>
          {data.results.map((result, key) => (
            <Result
              key={key}
              size={result.size}
              state={result.state}
              prefecture={result.prefecture}
              price={result.price}
              owner={result.owner}
              rating={result.rating}
              raters={result.raters}
              image={result.images[0]}
              profilePic={result.profilePics}
              color={color}
            />
          ))}
          <Result />
        </ResultsContainer>
      </Container>
    )
  }
}

const mapStateToProps = ({ color }) => ({ color })
const mapDispatchToProps = { ...colorActions }

export default connect(mapStateToProps, mapDispatchToProps)(ResultScene)
