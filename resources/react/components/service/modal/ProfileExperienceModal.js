import React, { useState } from 'react';
import { useDispatch } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Radio from '../../common/Radio';

const ProfileExperienceModal = _ => {
  const dispatch = useDispatch(); // TODO on other events
  const [formValues, setFormValues] = useState({
    item1: '',
    item2: '',
    item3: '',
    item4: '',
    item5: '',
    item6: '',
  });

  const toggleChange = e => { // TODO, buggy return
    e.persist();

    setFormValues(prevState => {
      return { ...prevState, [e.target.name]: e.target.value }
    });
  }

  return (
    <BaseModal title="経験分野">
      <div className="modal__content modal__content--edit-programming">
        <form className="modal__form" onSubmit={_ => console.log('Submit experience')}>
          <ul className="modal__form-table modal__form-table--edit-programming">
            <li className="modal__form-table-item modal__form-table-item--header">
              <div className="modal__form-table-item-wrapper">
                <span className="modal__form-table-item-label"></span>
                <span className="modal__form-table-item-label">なし</span>
                <span className="modal__form-table-item-label">半年以内</span>
                <span className="modal__form-table-item-label">1年以内</span>
                <span className="modal__form-table-item-label">1年以上</span>
                <span className="modal__form-table-item-label">２年以上</span>
              </div>
            </li>
            <li className="modal__form-table-item modal__form-table-item--edit-programming">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  プログラムコーディング
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item1a"
                  checked={true}
                  onChange={e => toggleChange(e)}
                  name="item1"
                  type="radio"
                  text="なし"
                />
                <Radio className="modal__form-table-item-value"
                  value="item1b"
                  onChange={e => toggleChange(e)}
                  name="item1"
                  type="radio"
                  text="半年以内"
                />
                <Radio className="modal__form-table-item-value"
                  value="item1c"
                  onChange={e => toggleChange(e)}
                  name="item1"
                  type="radio"
                  text="1年以内"
                />
                <Radio className="modal__form-table-item-value"
                  value="item1d"
                  onChange={e => toggleChange(e)}
                  name="item1"
                  type="radio"
                  text="1年以上"
                />
                <Radio className="modal__form-table-item-value"
                  value="item1e"
                  onChange={e => toggleChange(e)}
                  name="item1"
                  type="radio"
                  text="２年以上"
                />
              </div>
            </li>
            <li className="modal__form-table-item modal__form-table-item--edit-programming">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  システム設計
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item2a"
                  checked={true}
                  onChange={e => toggleChange(e)}
                  name="item2"
                  type="radio"
                  text="なし"
                />
                <Radio className="modal__form-table-item-value"
                  value="item2b"
                  onChange={e => toggleChange(e)}
                  name="item2"
                  type="radio"
                  text="半年以内"
                />
                <Radio className="modal__form-table-item-value"
                  value="item2c"
                  onChange={e => toggleChange(e)}
                  name="item2"
                  type="radio"
                  text="1年以内"
                />
                <Radio className="modal__form-table-item-value"
                  value="item2d"
                  onChange={e => toggleChange(e)}
                  name="item2"
                  type="radio"
                  text="1年以上"
                />
                <Radio className="modal__form-table-item-value"
                  value="item2e"
                  onChange={e => toggleChange(e)}
                  name="item2"
                  type="radio"
                  text="２年以上"
                />
              </div>
            </li>
            <li className="modal__form-table-item modal__form-table-item--edit-programming">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  保守、追加開発
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item3a"
                  checked={true}
                  onChange={e => toggleChange(e)}
                  name="item3"
                  type="radio"
                  text="なし"
                />
                <Radio className="modal__form-table-item-value"
                  value="item3b"
                  onChange={e => toggleChange(e)}
                  name="item3"
                  type="radio"
                  text="半年以内"
                />
                <Radio className="modal__form-table-item-value"
                  value="item3c"
                  onChange={e => toggleChange(e)}
                  name="item3"
                  type="radio"
                  text="1年以内"
                />
                <Radio className="modal__form-table-item-value"
                  value="item3d"
                  onChange={e => toggleChange(e)}
                  name="item3"
                  type="radio"
                  text="1年以上"
                />
                <Radio className="modal__form-table-item-value"
                  value="item3e"
                  onChange={e => toggleChange(e)}
                  name="item3"
                  type="radio"
                  text="２年以上"
                />
              </div>
            </li>
            <li className="modal__form-table-item modal__form-table-item--edit-programming">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  インフラ設計
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item4a"
                  checked={true}
                  onChange={e => toggleChange(e)}
                  name="item4"
                  type="radio"
                  text="なし"
                />
                <Radio className="modal__form-table-item-value"
                  value="item4b"
                  onChange={e => toggleChange(e)}
                  name="item4"
                  type="radio"
                  text="半年以内"
                />
                <Radio className="modal__form-table-item-value"
                  value="item4c"
                  onChange={e => toggleChange(e)}
                  name="item4"
                  type="radio"
                  text="1年以内"
                />
                <Radio className="modal__form-table-item-value"
                  value="item4d"
                  onChange={e => toggleChange(e)}
                  name="item4"
                  type="radio"
                  text="1年以上"
                />
                <Radio className="modal__form-table-item-value"
                  value="item4e"
                  onChange={e => toggleChange(e)}
                  name="item4"
                  type="radio"
                  text="２年以上"
                />
              </div>
            </li>
            <li className="modal__form-table-item modal__form-table-item--edit-programming">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  インフラ構築
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item5a"
                  checked={true}
                  onChange={e => toggleChange(e)}
                  name="item5"
                  type="radio"
                  text="なし"
                />
                <Radio className="modal__form-table-item-value"
                  value="item5b"
                  onChange={e => toggleChange(e)}
                  name="item5"
                  type="radio"
                  text="半年以内"
                />
                <Radio className="modal__form-table-item-value"
                  value="item5c"
                  onChange={e => toggleChange(e)}
                  name="item5"
                  type="radio"
                  text="1年以内"
                />
                <Radio className="modal__form-table-item-value"
                  value="item5d"
                  onChange={e => toggleChange(e)}
                  name="item5"
                  type="radio"
                  text="1年以上"
                />
                <Radio className="modal__form-table-item-value"
                  value="item5e"
                  onChange={e => toggleChange(e)}
                  name="item5"
                  type="radio"
                  text="２年以上"
                />
              </div>
            </li>
            <li className="modal__form-table-item modal__form-table-item--edit-programming">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">{`プロジェクトマネジメ
                  ント`}
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item6a"
                  checked={true}
                  onChange={e => toggleChange(e)}
                  name="item6"
                  type="radio"
                  text="なし"
                />
                <Radio className="modal__form-table-item-value"
                  value="item6b"
                  onChange={e => toggleChange(e)}
                  name="item6"
                  type="radio"
                  text="半年以内"
                />
                <Radio className="modal__form-table-item-value"
                  value="item6c"
                  onChange={e => toggleChange(e)}
                  name="item6"
                  type="radio"
                  text="1年以内"
                />
                <Radio className="modal__form-table-item-value"
                  value="item6d"
                  onChange={e => toggleChange(e)}
                  name="item6"
                  type="radio"
                  text="1年以上"
                />
                <Radio className="modal__form-table-item-value"
                  value="item6e"
                  onChange={e => toggleChange(e)}
                  name="item6"
                  type="radio"
                  text="２年以上"
                />
              </div>
            </li>
          </ul>
        </form>
        <div className="modal__actions">
          <Button className="button--icon">
            <>
              <i className="icon icon-disk"></i>
              セーブ
            </>
          </Button>
        </div>
      </div>
    </BaseModal>
  )
}

export default ProfileExperienceModal;
