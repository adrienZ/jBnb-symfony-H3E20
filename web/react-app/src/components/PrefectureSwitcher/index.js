import React, { Component } from 'react'
import styled from 'styled-components'

import Modal from '../Modal'
import Toggler from '../Toggler'

const Title = styled.h3`
  text-align: center;
`

const PrefecturesList = styled.div`
  display: flex;
  flex-flow: column wrap;
  height: 30rem;
`

const Prefecture = styled.div`
  display: flex;
  flex-flow: row nowrap;
  align-items: center;
  > *  {
    margin-left: .5rem;
  }
`
class PrefectureSelecter extends Component {
  constructor(props) {
    super(props)
    this.state = {}
  }

  onChangeMap(map){
    this.props.onSelectMap(map)
  }
  componentWillUpdate(){
  }
  togglePrefecture(index, active){
    if (active) {
      this.props.removePrefecture(index)
    } else {
      this.props.addPrefecture(index)
    }
  }

  render(){
    const { color, prefectures, activePrefecturesIndex } = this.props
    return (
      <Modal>
        <Title>Choisissez une région</Title>
        <PrefecturesList>
        {prefectures.map((prefecture, index) => (
          <Prefecture key={index} onClick={() => this.togglePrefecture(index, activePrefecturesIndex.includes(index) ? 1 : 0)}>
            <Toggler color={color} value={activePrefecturesIndex.includes(index) ? 1 : 0}/>
            {prefecture.name}
          </Prefecture>
        ))}
        </PrefecturesList>
      </Modal>
    )
  }
}

export default PrefectureSelecter
